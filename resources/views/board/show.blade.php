@extends('layouts.home')

@section('title', '投稿内容')

@section('content')
    <table>
        <tr>
            <th>{{ $board->title }}</th>
        </tr>
    </table>

    <table>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->getData() }}</td><!---->
            </tr>
        @endforeach
    </table>
@endsection
@section('footer')
    upbook1017
@endsection
