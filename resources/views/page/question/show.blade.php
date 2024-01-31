@extends('layouts.app')

@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="bg-white px-6 py-8 rounded-standart">
                <div class="py-[5px] mb-6 md:mb-10">
                    <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">{{ $question->title }}</h1>
                </div>
                <div class="content">
                    {!! $question->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection