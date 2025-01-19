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
        $data = $request->input('informessage');
        Mail::raw($data, function ($message) {
            $message->to('uptestuph@gmail.com')
                ->subject('お問い合わせ');
        });

        return redirect()->route('board.success');
    }

    public function success()
    {
        return view('board.success');
    }
}
