@extends('layouts.app')

@section('content')
    page.volunteer.index
    @dump($volunteers)
    @foreach ($volunteers as $volunteer)
        @dump($volunteer)
    @endforeach
    endpage.volunteer.index
@endsection