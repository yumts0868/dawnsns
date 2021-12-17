<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Post;

class PostsController extends Controller
{

    public function index()
    {
        $list = \DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('follows', 'posts.user_id', '=', 'follows.follow')
            ->where('follows.follower', Auth::id())
            ->orWhere('users.id', Auth::id())
            ->select('posts.id', 'images', 'username', 'post', 'posts.created_at')
            ->groupby('posts.id')
            ->get();
        //dd($list);
        return view('posts.index', ['list' => $list]);
    }

    //投稿作成処理
    public function create(Request $request)
    {
        $post = $request->input('post');
        //dd($post);
        Post::create([
            'user_id' => Auth::id(),
            'post' => $post,
        ]);
        return redirect('/top');
    }

    // 投稿編集機能処理
    public function edit($id, Request $request)
    {
        $post = Post::where('id', $id)
            ->first();
        $post->post = $request->edit;
        $post->save();
        return redirect('/top');
    }
    //投稿削除機能
    public function delete($id)
    {
        Post::find($id)
            ->delete();
        return redirect('/top');
    }
}
