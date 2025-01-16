@extends('layouts.flame')

@section('content')
    <main>
        <h1>新規投稿を作成</h1>
        <nav>
            <ul id="number_13">
                <li><a href="/board">掲示板一覧に戻る</a></li>
            </ul>
        </nav>
        <form action="/board/create" method="post">
            @csrf
            @error('title')
                <div class="number_14">
                    <tr>
                        <td>{{ $message }}</td>
                    </tr>
                </div>
            @enderror
            <table class="number_15">
                <tr>
                    <th>タイトル名:</th>
                    <td class="number_16-1"><input type="text" name="title" placeholder="タイトル名は0~20文字までです。"
                            value="{{ old('title') }}" class="number_16-2"></td>
                </tr>
            </table>

            @error('posts.name')
                <div class="number_14">
                    <tr>
                        <td>{{ $message }}</td>
                    </tr>
                </div>
            @enderror

            <table class="number_17">
                <tr>
                    <th>名前:</th>
                    <td class="number_18-1"><input type="text" name="posts[name]"
                            placeholder="0~15文字まで。(未入力の場合は「名無しさん」と表示されます)"
                            value="{{ request()->cookie('posts.name', old('posts.name')) }}" class="number_18-2"></td>
                </tr>
            </table>

            @error('posts.message')
                <div class="number_14">
                    <tr>
                        <td>{{ $message }}</td>
                    </tr>
                </div>
            @enderror

            <table class="number_19">
                <th>投稿内容</th>
            </table>

            <div class="number_20-1">
                <tr>
                    <td><!--textareaはvalueを使用できないため閉箇所にold記載。-->
                        <textarea class="number_20-2" name="posts[message]" placeholder="投稿内容は0~100文字までです。">{{ old('posts.message') }}</textarea>
                    </td>
                </tr>
            </div>

            <div class="number_21">
                <tr>
                    <td><input type="submit" value="新規投稿"></td>
                </tr>
            </div>
        </form>
    </main>
@endsection
