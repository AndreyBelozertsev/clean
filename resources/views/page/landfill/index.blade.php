@extends('layouts.app')

@section('content')
    page.landfill.index
        <a href="{{ route('landfill-map.index') }}">Свалки на карте</a>
        Свалки
        @dump($landfills)
    endpage.landfill.index
@endsection