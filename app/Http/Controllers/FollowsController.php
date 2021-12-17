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
        $follow = Follow::join('users', 'follows.follow', '=', 'users.id')
            ->where('follows.follower', Auth::id())
            ->select('users.images', 'users.username', 'users.id')
            ->get();
        //dd($follow);
        $followpost = Follow::join('users', 'follows.follow', '=', 'users.id')
            ->join('posts', 'follows.follow', '=', 'posts.user_id')
            ->where('follows.follower', Auth::id())
            ->select('users.images', 'users.username', 'posts.post', 'posts.created_at')
            ->get();
        return view('follows.followList', compact('follow', 'followpost'));
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
        Follow::where('follow', $unfollow)
            ->where('follower', Auth::id())
            ->delete();
        return redirect('/search');
    }
    //プロフィール画面の表示
    public function fp($id)
    {
        $fp = User::where('id', $id)
            ->first();
        $fpPost = \DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('posts.id', 'images', 'username', 'post', 'posts.created_at')
            ->groupby('posts.id')
            ->get();
        return view('follows.fp', compact('fp', 'fpPost'));
    }
}
