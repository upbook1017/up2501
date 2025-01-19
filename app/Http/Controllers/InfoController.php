<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\InfoRequest;//フォームリクエストよりvalidateメソッドを使用可能にする。

class InfoController extends Controller
{
    public function info(Request $request)
    {
        return view('board.info');
    }

    public function send(InfoRequest $request)
    {
        $data = $request->input('informessage');//入力フォームよりinformessageの値を$dataに代入。
        Mail::raw($data, function ($message) {
            $message->to('uptestuph@gmail.com')//メールアドレスに(to)$dataの$messageを送る。
                ->subject('お問い合わせ');//メールのsubject件名。
        });

        return redirect()->route('board.success');
    }

    public function success()
    {
        return view('board.success');
    }
}
