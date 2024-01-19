@extends('layouts.app')

@section('content')
    <br>page.default.index<br>
    <br>Стандартная страниц<br>
        {{ $page->title }}<br>
        {!! $page->content !!}<br>
    <br>endpage.default.index<br>
@endsection