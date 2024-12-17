<?php

namespace App\Http\Controllers;

use App\Models\Board;//Boardモデルを使用可能にする。
use App\Http\Requests\BoardAndPostRequest;//フォームリクエストよりvalidateメソッドを使用可能にする。
use Illuminate\Http\Request;

class BoardController extends Controller
{
    //掲示板一覧
    public function index(Request $request)//Board内データの値全てをindexに渡す。
    {
        /*$items = Board::all();*///N+1問題によりコメント化
        $items = Board::get();
        return view('board.index', ['items' => $items]);
    }
    //投稿内容
    public function show(Board $board)//indexより該当する投稿内容を表示
    {
        $posts = $board->posts;
        return view('board.show', compact('board', 'posts'));
    }
    //新規投稿作成ページ
    public function create(Request $request)//新規掲示板作成ページ表示
    {
        return view('board.create');
    }

    public function store(BoardAndPostRequest $request)//新規掲示板作成ページ上でのタイトルと一回目のメッセージ作成
    {
        /*$request->validate(Board::$rules);*/ //Board.phpの$rulesをコメントアウトしたため、コメントアウト
        $board = new Board;
        $form = $request->all();
        if (empty($form['name'])) {
            $form['name'] = '名無しさん'; //'name'が空の時(未入力)は「名無しさん」と表記する。また、postのnameなので'posts.name'にはしない。
        }
        unset($form['_token']);
        $board->fill($form)->save();
        $post = $form['posts'];
        if (empty($post['name'])) {
            $post['name'] = '名無しさん'; //post内の'name'が空の時(未設定)は「名無しさん」と表記する。また、postのnameなので'posts.name'にはしない。
        }
        $board->posts()->create($post);

        return redirect()->route('board.show', ['board' => $board->id]);
    }

}
