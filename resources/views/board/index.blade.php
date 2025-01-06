@extends('layouts.home')

@section('title', '掲示板一覧')

@section('content')
    <form action="{{ route('board.index') }}" method="get">
        <label for="sortOrder">作成日の順番変更:</label>
        <select name="sortOrder" id="sortOrder" onchange="this.form.submit()"><!--selectタグよりソート順の表示機能追加。-->
            <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>作成日が古い順</option>
            <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>作成日が新しい順</option>
        </select>
    </form>

    <table>
        @foreach ($items as $item)
            <tr>
                <td><a href="{{ route('board.show', $item) }}">{{ $item->getData() }}</a></td><!--Boardモデルの全てのデータを出力-->
                <td>{{ $item->posts_count }}</td><!--withCountにおいて「posts_count」と命名規則が決まっている。-->
                <td>{{ $item->created_at->format('Y-m-d') }}</td><!--レコードの作成日において「create_at」と命名規則が決まっている。-->
            </tr>
        @endforeach
    </table>
@endsection
@section('footer')
    upbook1017
@endsection
