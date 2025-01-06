<?php

namespace App\Http\Controllers;

use App\Models\Board;//Boardモデルを使用可能にする。
use App\Http\Requests\BoardAndPostRequest;//フォームリクエストよりvalidateメソッドを使用可能にする。
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;//cookieを使用可能にする。

class BoardController extends Controller
{
    //掲示板一覧
    public function index(Request $request)//Board内データの値全てをindexに渡す。
    {
        $sortOrder = $request->get('sortOrder', 'asc');//ソート機能追加。デフォルトは昇順にした。
        /*$items = Board::all();*///N+1問題によりコメント化
        $items = Board::withCount('posts')//投稿内容の数を表示する。
            ->orderBy('created_at', $sortOrder)//ソート機能よりデータを取得。(作成日(created_atより))
            ->get();//データを全て表示する。
        return view('board.index', ['items' => $items, 'sortOrder' => $sortOrder]);
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
        Cookie::queue('name', $form['name'], 60);//cookieを1時間に設定した。
        $board->posts()->create($post);
        cookie::queue(cookie::forget('name'));//新規投稿ページ作成後は一旦cookieを削除する。

        return redirect()->route('board.show', ['board' => $board->id]);
    }

}
