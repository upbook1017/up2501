@extends('layouts.flame')

@section('content')
    <form action="/board/create" method="post">
        <table>
            @csrf
            @error('title')
                <tr>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>タイトル名: </th>
                <td><input type="text" name="title" placeholder="タイトル名は0~20文字までです。" value="{{ old('title') }}"></td>
            </tr>

            @error('posts.name')
                <tr>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>名前: </th>
                <td><input type="text" name="posts[name]" placeholder="未入力の場合は「名無しさん」と表示されます。"
                        value="{{ request()->cookie('posts.name', old('posts.name')) }}"></td>
            </tr>

            @error('posts.message')
                <tr>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>投稿内容: </th>
                <td><input type="text" name="posts[message]" placeholder="投稿内容は0~100文字までです。"
                        value="{{ old('posts.message') }}"></td>
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
