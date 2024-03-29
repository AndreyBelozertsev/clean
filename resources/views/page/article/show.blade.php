@extends('layouts.app')

@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="bg-white px-2 md:px-6 py-8 rounded-standart">
                <div class="py-[5px] mb-6 md:mb-10">
                    <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl mb-2 md:mb-4">{{ $article->title }}</h1>
                    <p>
                        Опубликовано: 
                        <span class="font-inter-300">{{ getHumanDate($article->created_at)  }}</span>
                    </p>
                </div>
                @if($article->thumbnail)
                    <div class="w-full rounded-standart overflow-hidden mb-6 md:mb-10 h-full max-h-[600px] flex items-center">
                        <img class="w-full h-full object-cover" src="{{ makeThumbnail('storage/' . $article->thumbnail, 'nullx600') }}" alt="{{ $article->title  }}">
                    </div>
                @endif
                <div class="content mb-12">
                    {!! $article->content !!}
                </div>
                @if($article->images && count($article->images))
                    <x-gallery.gallery-slider :images="$article->images" />
                @endif
            </div>
        </div>
    </section>
@endsection