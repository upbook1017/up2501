@extends('layouts.home')

@section('title', '投稿内容')

@section('content')
    <table>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->getData() }}</td><!--Postモデルの全てのデータを出力-->
            </tr>
        @endforeach
    </table>

    <form action="/post" method="post">
        <table>
            @csrf

            <tr>
                <th>name: </th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
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
