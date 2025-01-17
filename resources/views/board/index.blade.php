@extends('layouts.flame')

@section('content')
    <main>
        <h1>掲示板一覧</h1>
        <nav>
            <ul>
                <li><a href="board/create">新規投稿を作成</a></li>
            </ul>
        </nav>
        <form action="{{ route('board.index') }}" method="get">
            <div class="number_1">
                @error('search')<!--フォームリクエスト(SearchRequest.phpよりバリデーション設定。)-->
                    <div class="number_2">
                        <tr>
                            <td>{{ $message }}</td>
                        </tr>
                    </div>
                @enderror
                <tr>
                    <td>
                        <label for="search">タイトル検索:</label>
                        <input type="text" name="search" id="search" value="{{ $search }}" placeholder="10文字以内"
                            class="titlesearch"><!--検索機能追加より入力欄を追加。-->
                        <input type="submit" value="検索">

                        <label for="sortOrder" class="number_3">作成日の順番変更:</label>
                        <select name="sortOrder" id="sortOrder" class="number_4"
                            onchange="this.form.submit()"><!--selectタグよりソート順の表示機能追加。-->
                            <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>作成日が古い順</option>
                            <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>作成日が新しい順</option>
                        </select>
                    </td>
                </tr>
            </div>
        </form>

        @if ($items->isEmpty())<!--検索ワード空の場合。-->
            <p class="number_5">検索ワードがヒットしませんでした。(未入力検索より全てのタイトル名が表示されます。)</p>
        @else
            <table border="1">
                <tr>
                    <th class="number_6">新規投稿作成日</th>
                    <th class="number_7">タイトル名 ※クリックより参加できます。</th>
                    <th class="number_8">書き込み数</th>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td class="number_9">{{ $item->created_at->format('Y-m-d') }}</td><!--レコードの作成日において「create_at」と命名規則が決まっている。-->
                        <td class="number_10"><a href="{{ route('board.show', $item) }}"class="number_11">{{ $item->getData() }}</a></td><!--Boardモデルの全てのデータを出力-->
                        <td class="number_9">{{ $item->posts_count }}</td><!--withCountにおいて「posts_count」と命名規則が決まっている。-->
                    </tr>
                @endforeach
            </table>
            <!--ペジネーションよりリンクを追加。(また、app/Providers/AppServiceProvider.phpよりデフォルトを使用可能に設定している。)/appends(追加)より検索機能とソート機能のパラメーターを引き継がせた。-->
            <div class="number_12">{{ $items->appends(['search' => $search, 'sortOrder' => $sortOrder])->links() }}</div>
        @endif
    </main>
@endsection
