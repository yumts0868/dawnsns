<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Post;

class PostsController extends Controller
{
    //
    public function index()
    {
        $list = \DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('follows', 'posts.user_id', '=', 'follows.follow')
            ->where('follows.follower', Auth::id())
            ->where('users.id', Auth::id())
            ->select('posts.id', 'images', 'username', 'post', 'posts.created_at')
            ->groupby('posts.id')
            ->get();
        // dd($list);
        return view('posts.index', ['list' => $list]);
    }

    // 投稿編集機能処理

}
