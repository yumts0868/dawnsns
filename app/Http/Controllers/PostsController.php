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
            ->join('users', 'posts.user_id', '=', 'users.id') //postsのidとusersのidを一致させて取得
            ->leftJoin('follows', 'posts.user_id', '=', 'follows.follow') //postsとpostsのidとfollowsのidを一致させて取得
            ->where('follows.follower', Auth::id()) //フォローしてる人を取得
            ->orWhere('users.id', Auth::id()) //自分の情報を取得
            ->select('posts.id', 'images', 'username', 'post', 'posts.created_at', 'user_id')
            ->groupby('posts.id')
            ->get();
        //dd($list);
        return view('posts.index', ['list' => $list]); //listはindexのlist
    }

    //投稿作成処理
    public function create(Request $request)
    {
        $post = $request->input('post'); //inputタグのname属性
        //dd($post);
        Post::create([ //postクラスを使用してpostとuser_idをdbに入力可能にする
            'user_id' => Auth::id(),
            'post' => $post,
        ]);
        return redirect('/top');
    }

    // 投稿編集機能処理
    public function edit(Request $request)
    {
        $id = $request->input('id'); //inputタグのname属性がid（投稿の番号）
        //dd($id);
        $post = Post::where('id', $id) //選択した投稿に条件を絞ってそれだけ抽出
            ->first();
        $post->post = $request->input('edit');
        $post->save();
        return redirect('/top');
    }
    //投稿削除機能
    public function delete($id)
    {
        Post::find($id) //選択した投稿($id)を抽出->$idはルーティングで渡されたidのこと（ルートパラメーター）
            ->delete();
        return redirect('/top');
    }
}
