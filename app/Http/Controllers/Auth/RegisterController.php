<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:4|max:12',
            'mail' => 'required|string|email|max:225|unique:users',
            'password' => 'required|string|min:4|max:12|unique:users|confirmed',
        ], [
            'required' => '必須項目です',
            'min' => '4文字以上でお願いします',
            'username.max' => '12文字以内でお願いします',
            'mail.max' => '255文字以内で入力してください',
            'unique' => 'すでに使われています',
            'email' => 'メールアドレスでお願いします',
            'confirmed' => 'パスワードが異なります',
        ]);;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) { //post通信(値が入っていたら)
            $data = $request->input();
            $val = $this->validator($data);
            if ($val->fails()) {
                return redirect('register')
                    ->withErrors($val)
                    ->withInput();
            } else {
                $this->create($data);
                return redirect('added')->with(['name' => $data['username']]);
            }
        }
        return view('auth.register');
    }

    public function added()
    {
        return view('auth.added');
    }
}
