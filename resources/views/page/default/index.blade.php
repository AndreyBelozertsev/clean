@extends('layouts.app')

@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="bg-white px-2 md:px-6 py-8 rounded-standart">
                <div class="py-[5px] mb-6 md:mb-10">
                    <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">{{ $page->title }}</h1>
                </div>
                <div class="content">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection