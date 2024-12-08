<?php

namespace App\Http\Controllers;

use App\Models\Board;//Boardモデルを使用可能にする。
use Illuminate\Http\Request;

class BoardController extends Controller
{
    //掲示板一覧
    public function index(Request $request)//Board内データの値全てをindexに渡す。
    {
        $items = Board::all();
        return view('board.index', ['items' => $items]);
    }

    public function add(Request $request)//新規掲示板作成ページ表示
    {
        return view('board.add');
    }

    public function create(Request $request)//新規掲示板作成ページ上でのタイトルと一回目のメッセージ作成
    {
        $request->validate(Board::$rules);
        $post = new Board;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/post');
    }

}
