<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class UsersController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $user)
    {
        return Validator::make($user, [
            'username' => 'string|min:4|max:12',
            'mail' => 'string|email|max:225',
            'newpass' => 'nullable|string|alpha_num|min:4|max:12|unique:users,password',
            'bio' => 'nullable|string|max:200',
            'images' => 'nullable|image',
        ], [
            'required' => '必須項目です',
            'min' => '4文字以上でお願いします',
            'username.max' => '12文字以内でお願いします',
            'mail.max' => '255文字以内で入力してください',
            'unique' => 'すでに使われています',
            'alpha_num' => '半角英数字でお願いします',
            'email' => 'メールアドレスでお願いします',
            'bio.max' => '200文字以内で入力してください',
            'image' => '画像ファイルでお願いします',
        ]);;
    }


    public function update(Request $request)
    {
        $user = $request->input();
        $file = $request->file('image');
        //バリデーションの処理
        if (isset($user)) {
            $val = $this->validator($user);
            if ($val->fails()) {
                return redirect('/profile')
                    ->withErrors($val)
                    ->withInput();
            }
            //パスワードとアイコン両方入っている場合
            if (isset($user['newpass']) && isset($file)) {
                $file_name = $file->getClientOriginalName();
                $file->storeAs('images', $file_name, 'image_pass');
                \DB::table('users')
                    ->where('id', Auth::id())
                    ->update(
                        [
                            'username' => $user['username'],
                            'mail' => $user['mail'],
                            'password' => $user['newpass'],
                            'bio' => $user['bio'],
                            'images' => $file_name
                        ]
                    );
            }
            //パスワードのみ入っていた場合
            elseif (isset($user['newpass']) && !isset($file)) {
                \DB::table('users')
                    ->where('id', Auth::id())
                    ->update(
                        [
                            'username' => $user['username'],
                            'mail' => $user['mail'],
                            'password' => $user['newpass'],
                            'bio' => $user['bio']
                        ]
                    );
                //アイコンのみ入っていた場合
            } elseif (!isset($user['newpass']) && isset($file)) {
                $file_name = $file->getClientOriginalName();
                $file->storeAs('images', $file_name, 'image_pass');
                \DB::table('users')
                    ->where('id', Auth::id())
                    ->update(
                        [
                            'username' => $user['username'],
                            'mail' => $user['mail'],
                            'bio' => $user['bio'],
                            'images' => $file_name
                        ]
                    );
            } else {
                \DB::table('users')
                    ->where('id', Auth::id())
                    ->update(
                        [
                            'username' => $user['username'],
                            'mail' => $user['mail'],
                            'bio' => $user['bio']
                        ]
                    );
            }
            //dd($user);
            return redirect('/top');
        }
    }

    //サーチに＄リストに入っているユーザー情報を送る
    public function search()
    {
        $list = \DB::table('users')->get();
        // dd($Auth->username);
        return view('users.search', ['list' => $list]);
    }

    //ユーザー検索結果表示
    public function result(Request $request)
    {
        $word = $request->input('search');
        $list = \DB::table('users')
            ->where('username', 'like', "%$word%")
            ->get();
        return view('users.search', compact('word', 'list'));
    }
}
