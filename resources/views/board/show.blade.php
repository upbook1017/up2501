@extends('layouts.flame')

@section('content')
    <main>
        <h1>{{ $board->title }}</h1>

        <nav>
            <ul id="number_13">
                <li><a href="/board">掲示板一覧に戻る</a></li>
            </ul>
        </nav>

        <div class="number_22">

            @foreach ($posts as $post)
                <table class="number_23" id="post-{{ $post->id }}"><!--id属性はPostController.phpのリダイレクトより追加。-->
                    <tr>
                        <!--<td>{{-- $post->getData() --}}</td> 投稿内容を全て出力する(表示との兼ね合いでgetDataでの出力はコメントアウトとする。)-->
                        <td class="number_24">{{ $post->name }}<br>{{ $post->message }}</td>
                    </tr>
                </table>
            @endforeach

        </div>

        <form action="{{ route('board.show', $board) }}" method="post">
            @csrf
            <input type="hidden" name="board_id" value="{{ $board->id }}">
            @error('name')
                <div class="number_14">
                    <tr>
                        <td>{{ $message }}</td>
                    </tr>
                </div>
            @enderror

            <table class="number_17">
                <tr>
                    <th>名前:</th>
                    <td class="number_18-1"><input type="text" name="name"
                            placeholder="0~15文字まで。(未入力の場合は「名無しさん」と表示されます)"
                            value="{{ request()->cookie('name', old('name')) }}" class="number_18-2"></td>
                </tr>
            </table>

            @error('message')
                <div class="number_14">
                    <tr>
                        <td>{{ $message }}</td>
                    </tr>
                </div>
            @enderror

            <table class="number_19">
                <th>投稿内容</th>
            </table>

            <div class="number_25-1">
                <tr>
                    <td>
                        <textarea class="number_25-2" name="message" placeholder="投稿内容は0~100文字までです。">{{ old('message') }}</textarea>
                    </td>
                </tr>
            </div>

            <div class="number_26">
                <tr>
                    <td><input type="submit" value="送信"></td>
                </tr>
            </div>
    </main>
@endsection
