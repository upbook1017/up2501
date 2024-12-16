<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $guarded = array('id');//idの値不要とする。

    /*public static $rules = array(   //ルール設定(フォームリクエスト(BoardAndPostRequest.php)よりルール設定にしたため、コメントアウト)
        'title' => 'required'
    );*/

    public function getData()//値を文字列にまとめて返す。(掲示板作成時刻も文字列に入れておく。)
    {
        return $this->title;
    }

    public function posts()//Boardモデルは複数のPostモデルを持つ
    {
        return $this->hasMany('App\Models\Post');
    }

}
