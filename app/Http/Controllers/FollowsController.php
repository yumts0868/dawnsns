<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follow;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use DB;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        $follow = Follow::join('users', 'follows.follow', '=', 'users.id') //followクラスを使用してusersのidとfollowを
            ->where('follows.follower', Auth::id()) //followerカラムのidがログインされているものと一致するものつまりフォロー
            ->select('users.images', 'users.id')
            ->get();
        //dd($follow);
        $followpost = Follow::join('users', 'follows.follow', '=', 'users.id') //followクラスを使用してusersのidとfollow
            ->join('posts', 'follows.follow', '=', 'posts.user_id') //さらにpostsのuser_idとfollowをつなげる
            ->where('follows.follower', Auth::id()) //followerカラムのidがログインされているものと一致するものつまりフォロー
            ->select('users.images', 'users.username', 'posts.post', 'posts.created_at')
            ->get();
        return view('follows.followList', compact('follow', 'followpost')); //値を渡してリビュー
    }

    public function followerList()
    {
        $follower = Follow::join('users', 'follows.follower', '=', 'users.id')
            ->where('follows.follow', Auth::id())
            ->select('users.images', 'users.username', 'users.id')
            ->get();
        $followerpost = Follow::join('users', 'follows.follower', '=', 'users.id')
            ->join('posts', 'follows.follower', '=', 'posts.user_id')
            ->where('follows.follow', Auth::id())
            ->select('users.images', 'users.username', 'posts.post', 'posts.created_at')
            ->get();
        return view('follows.followerList', compact('follower', 'followerpost'));
    }
    //フォローする
    public function follow(Request $request)
    {
        $follow = $request->input('follow');
        // dd(Auth::id());
        Follow::create([ // Followテーブルに入れる
            'follow' => $follow, // フォローする相手のID
            'follower' => Auth::id(), // 自分のID
        ]);
        return redirect('/search');
    }
    //フォローをはずす
    public function unfollow(Request $request)
    {
        $unfollow = $request->input('unfollow');
        // dd(Auth::id());
        Follow::where('follow', $unfollow) //followカラムの指定（クリック）したid
            ->where('follower', Auth::id()) //かつ自分がフォローしていた場合
            ->delete();
        return redirect('/search');
    }
    //プロフィール画面の表示
    public function fp($id)
    {
        $fp = User::where('id', $id) //userクラスを使用してusersのidカラムの値が選択したidのものになるよう指定
            ->first(); //その情報だけ取ってきて変数に入れる
        $fpPost = \DB::table('posts') //postsテーブルを使用する
            ->join('users', 'posts.user_id', '=', 'users.id') //usersのidとpostsのidをつなげる
            ->where('users.id', $id) //usersのidが選択した友達のidになるよう指定
            ->select('posts.id', 'images', 'username', 'post', 'posts.created_at') //必要な情報を選択して
            ->groupby('posts.id') //idごとにグループ化
            ->get(); //取得
        return view('follows.fp', compact('fp', 'fpPost')); //情報を渡してリビュー
    }
}
