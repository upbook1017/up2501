@extends('layouts.home')

@section('title', '掲示板一覧')

@section('content')
    <table>
        @foreach ($items as $item)
            <tr>
                <td><a href="{{ route('board.show', $item) }}">{{ $item->getData() }}</a></td><!--Boardモデルの全てのデータを出力-->
                <td>{{ $item->posts_count }}</td><!--withCountにおいて「posts_count」と命名規則が決まっている。-->
                <td>{{ $item->created_at->format('Y-m-d')}}</td><!--レコードの作成日において「create_at」と命名規則が決まっている。-->
            </tr>
        @endforeach
    </table>
@endsection
@section('footer')
    upbook1017
@endsection
