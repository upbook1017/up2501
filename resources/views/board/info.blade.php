@extends('layouts.flame')

@section('content')
    <main>
        <h1>お問い合わせ</h1>
        <nav>
            <ul id="number_13">
                <li><a href="/board">掲示板一覧に戻る</a></li>
            </ul>
        </nav>
        <form action="/board/info" method="post">
            @csrf
            @error('informessage')
                <div class="number_14">
                    <tr>
                        <td>{{ $message }}</td>
                    </tr>
                </div>
            @enderror

            <table class="number_27">
                <th>お問い合わせ内容</th>
            </table>

            <div class="number_20-1">
                <tr>
                    <td><!--textareaはvalueを使用できないため閉箇所にold記載。-->
                        <textarea class="number_20-2" name="informessage" placeholder="お問い合わせ内容は0~300文字までです。">{{ old('informessage') }}</textarea>
                    </td>
                </tr>
            </div>

            <div class="number_28">
                <tr>
                    <td><input type="submit" value="送信"></td>
                </tr>
            </div>
        </form>
    </main>
@endsection
