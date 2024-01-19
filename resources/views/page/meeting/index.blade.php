@extends('layouts.app')

@section('content')
    page.meeting.index
    Субботники
    @dump($meetings)
    <x-meeting.meeting-map />
    endpage.meeting.index
@endsection