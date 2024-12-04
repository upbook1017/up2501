<?php

namespace App\Http\Controllers;

use App\Models\Board;//Boardモデルを使用可能にする。
use Illuminate\Http\Request;

class BoardController extends Controller
{

    public function index(Request $request)
    {
        $items = Board::all();
        return view('board.index', ['items' => $items]);//Board内データの値全てをindexに渡す。
    }
}
