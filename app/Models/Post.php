<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    /*public static $rules = array( //ルール設定(フォームリクエスト(BoardAndPostRequest.php)よりルール設定にしたため、コメントアウト)
        'board_id' => 'required',
        'name' => 'required',
        'message' => 'required'
    );*/

    public function board()//Postモデルは1つのBoardに属する。
    {
        return $this->belongsTo('App\Models\Board');
    }

    public function getData()
    {
        return $this->name . ':' . $this->message;
    }
}
