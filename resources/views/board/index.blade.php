@extends('layouts.home')

@section('title', '掲示板一覧')

@section('content')
    <form action="{{ route('board.index') }}" method="get">
        <table>
            @error('search')<!--フォームリクエスト(SearchRequest.phpよりバリデーション設定。)-->
                <tr>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <td>
                    <label for="search">タイトル検索:</label>
                    <input type="text" name="search" id="search" value="{{ $search }}"
                        placeholder="タイトルを入力"><!--検索機能追加より入力欄を追加。-->

                    <label for="sortOrder">作成日の順番変更:</label>
                    <select name="sortOrder" id="sortOrder" onchange="this.form.submit()"><!--selectタグよりソート順の表示機能追加。-->
                        <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>作成日が古い順</option>
                        <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>作成日が新しい順</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>

    @if ($items->isEmpty())<!--検索ワード空の場合。-->
        <p>検索ワードがヒットしませんでした。</p>
    @else
        <table>
            @foreach ($items as $item)
                <tr>
                    <td><a href="{{ route('board.show', $item) }}">{{ $item->getData() }}</a></td><!--Boardモデルの全てのデータを出力-->
                    <td>{{ $item->posts_count }}</td><!--withCountにおいて「posts_count」と命名規則が決まっている。-->
                    <td>{{ $item->created_at->format('Y-m-d') }}</td><!--レコードの作成日において「create_at」と命名規則が決まっている。-->
                </tr>
            @endforeach
        </table>
    @endif
@endsection
@section('footer')
    upbook1017
@endsection
