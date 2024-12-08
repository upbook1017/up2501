<?php

namespace App\Http\Controllers;

use App\Models\Post;//Postモデルを使用可能
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()//投稿内容を表示
    {
        $items = Post::all();
        return view('post.index', ['items' => $items]);
    }

    public function create(Request $request)//投稿内容表示ページ上で新しく投稿する。
    {
        $request->validate(Post::$rules);
        $post = new Post;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/post');
    }

}
