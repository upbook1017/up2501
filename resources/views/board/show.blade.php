@extends('layouts.home')

@section('title', '投稿内容')

@section('content')
    <table>
        <tr>
            <th>{{ $board->title }}</th>
        </tr>
    </table>

    <table>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->getData() }}</td><!--投稿内容を全て出力する-->
            </tr>
        @endforeach
    </table>

    <form action="{{ route('board.show', $board) }}" method="post">
        @csrf
        <input type="hidden" name="board_id" value="{{ $board->id }}">
        <table>
            @error('name')
                <tr>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>名前:</th>
                <td><input type="text" name="name" placeholder="未入力の場合は「名無しさん」と表示されます。"
                        value="{{ request()->cookie('name', old('name')) }}"></td>
            </tr>

            @error('message')
                <tr>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>投稿内容:</th>
                <td><input type="text" name="message" placeholder="投稿内容は0~100文字までです。" value="{{ old('message') }}"></td>
            </tr>

            <td><input type="submit" value="送信"></td>
            </tr>
        </table>
    @endsection
    @section('footer')
        upbook1017
    @endsection
