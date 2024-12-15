<?php

namespace App\Http\Controllers;

use App\Models\Post;//Postモデルを使用可能
use Illuminate\Http\Request;

class PostController extends Controller
{
    //投稿内容ページ(新規投稿作成)
    public function store(Request $request)//投稿内容表示ページ上で新しく投稿する。
    {
        $request->validate(Post::$rules);
        $post = new Post;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        $board_id = $form['board_id'];

        return redirect()->route('board.show', ['board' => $board_id]);
    }

}
