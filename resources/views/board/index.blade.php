@extends('layouts.home')

@section('title', '掲示板一覧')

@section('content')
    <table>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->getData() }}</td>
            </tr>
        @endforeach
    </table>
@endsection
@section('footer')
    upbook1017
@endsection
