<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }


    public function update(Request $request)
    {
        $up = $request->input();

        if (isset($up)) {
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $file_name, 'root_public');

            $user = Auth::user();
            $user->username = $request->newname;
            $user->mail = $request->newmail;
            $user->password = bcrypt($request->newpass);
            $user->bio = $request->newbio;
            $user->images = $file_name;
            $user->save();
            return redirect('/profile');
        } else {
            $user = Auth::user();
            $user->username = $request->newname;
            $user->mail = $request->newmail;
            $user->bio = $request->newbio;
            $user->save();
            return redirect('/profile');
        }
        /* return view('users.profile', compact('user')); */
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
        $word = $request->search;
        $list = \DB::table('users')
            ->where('username', 'like', "%$word%")
            ->get();
        return view('users.search', ['list' => $list]);
    }
}
