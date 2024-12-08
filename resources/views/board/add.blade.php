@extends('layouts.home')

@section('title', '掲示板新規作成')

@section('content')
    <form action="/board/add" method="post">
        <table>
            @csrf

            <tr>
                <th>name: </th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>

            <tr>
                <th>title: </th>
                <td><input type="text" name="title" value="{{ old('title') }}"></td>
            </tr>

            <tr>
                <th>message: </th>
                <td><input type="text" name="message" value="{{ old('message') }}"></td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>

        </table>
    </form>
@endsection
@section('footer')
    upbook1017
@endsection
