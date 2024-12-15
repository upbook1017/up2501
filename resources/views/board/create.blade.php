@extends('layouts.home')

@section('title', '掲示板新規作成')

@section('content')
    <form action="/board/create" method="post">
        <table>
            @csrf

            <tr>
                <th>title: </th>
                <td><input type="text" name="title" value="{{ old('title') }}"></td>
            </tr>

            <tr>
                <th>name: </th>
                <td><input type="text" name="posts[name]" value="{{ old('posts.name') }}"></td>
            </tr>

            <tr>
                <th>message: </th>
                <td><input type="text" name="posts[message]" value="{{ old('posts.message') }}"></td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" value="新規投稿"></td>
            </tr>

        </table>
    </form>
@endsection
@section('footer')
    upbook1017
@endsection
