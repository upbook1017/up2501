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
                <td>{{ $post->getData() }}</td><!---->
            </tr>
        @endforeach
    </table>

    <form action="{{ route('board.show', $board) }}" method="post">
        @csrf
        <input type="hidden" name="board_id" value="{{ $board->id }}">
        <table>
            <tr>
                <th>name:</th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>

            <tr>
                <th>message:</th>
                <td><input type="text" name="message" value="{{ old('message') }}"></td>
            </tr>

            <td><input type="submit" value="送信"></td>
            </tr>
        </table>
    @endsection
    @section('footer')
        upbook1017
    @endsection
