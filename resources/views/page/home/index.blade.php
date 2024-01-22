@extends('layouts.app')

@section('content')
    Главная страница
    <x-article.first-article />
    <x-landfill.landfills-map />
    <x-volunteer.volunteers-list />
    <x-landfill.landfills-list />
@endsection