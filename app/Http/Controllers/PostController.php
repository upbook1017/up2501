<?php

namespace App\Http\Controllers;

use App\Models\Post;//Postモデルを使用可能
use App\Http\Requests\BoardAndPostRequest;//フォームリクエストよりvalidateメソッドを使用可能にする。
use Illuminate\Http\Request;

class PostController extends Controller
{
    //投稿内容ページ(新規投稿作成)
    public function store(BoardAndPostRequest $request)//投稿内容表示ページ上で新しく投稿する。
    {
        /*$request->validate(Post::$rules);*/ //Post.phpの$rulesをコメントアウトしたため、コメントアウト
        $post = new Post;
        $form = $request->all();
        if (empty($form['name'])) {
            $form['name'] = '名無しさん'; //'name'が空の時(未入力)は「名無しさん」と表記する。
        }
        unset($form['_token']);
        $post->fill($form)->save();
        $board_id = $form['board_id'];

        return redirect()->route('board.show', ['board' => $board_id]);
    }

}
