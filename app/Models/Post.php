<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'board_id' => 'required',
        'name' => 'required',
        'message' => 'required'
    );

    public function getData()
    {
        return $this->name . ':' . $this->message;
    }

}
