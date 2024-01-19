@extends('layouts.app')

@section('content')
    Главная страница
    <x-article.first-article />
    <x-landfill.landfills-map />
    <x-hero.heroes-list />
    <x-landfill.landfills-list />
@endsection