@extends('layouts.app')

@section('content')
    @php
        $img = asset('/images/no-img.svg');
        if($meeting->thumbnail){
            $img = makeThumbnail('storage/' . $meeting->thumbnail, '600x600');
        }
    @endphp
    <section class="pt-8 md:pt-16 mb-10 md:mb-20">
        <div class="container">
            <div class="grid lg:grid-cols-volunteer-block gap-8">
                <div class="bg-white rounded-standart px-2 md:px-6 py-8 flex justify-center w-full h-full">
                    <div class="max-h-[400px] max-w-[400px] overflow-hidden rounded-standart lg:max-h-[250px] lg:max-w-[250px] w-full h-full  p-1">
                        <img class="h-full w-full" src="{{ $img }}" alt="{{ $meeting->title  }}">   
                    </div>
                </div>
                <div class="bg-white rounded-standart px-6 py-8">
                    <div class="py-[5px] mb-2 md:mb-4">
                        <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl mb-2 md:mb-4">{{ $meeting->title }}</h1>
                        @if($meeting->city)
                            <p class="mb-2">
                                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                    {{ $meeting->city->title }}
                                </span>
                            </p>
                        @endif
                        <div class="flex gap-[6px] py-[6px] ml-1">
                            <img data-src="/images/icons/map-pin.svg" src="/images/icons/map-pin.svg" alt="map pin">
                            <p>{{ $meeting->city?->title . ', '}} {{ $meeting->address }}</p>
                        </div>
                        <p class="text-lg font-inter-800 mb-2">
                            Начало:
                            <span class="font-inter-400">
                                {{ getHumanDate($meeting->start_at, true ) }}
                            </span>
                        </p>
                        @if( $meeting->name || $meeting->phone )
                            <p class="text-lg font-inter-800 mb-2">
                                Контакты:
                                <span class="font-inter-400">
                                    {{ $meeting->name ?? $meeting->name }}
                                    @if( $meeting->phone )
                                        <a href="tel:{{ $meeting->phone }}">{{ $meeting->phone }}</a>
                                    @endif
                                </span>
                            </p>
                        @endif 
                    </div>
                    <div class="content mb-12">
                        {!! $meeting->content !!}
                    </div>
                    @if($meeting->images && count($meeting->images))
                        <x-gallery.gallery-slider :images="$meeting->images" />
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="mb-10 md:mb-20">
        <div class="container">
            <div class="bg-white rounded-standart px-2 md:px-6 py-8">
                <div class="flex justify-between items-center">
                    <h4 class="font-inter-800 text-2xl mb-2 md:mb-4">
                        На карте
                    </h4>
                </div>
                <x-meeting.meeting-map data-meetings="{{ collect(['meetings' => [$meeting]])->toJson() }}" />
            </div>
        </div>
    </section>


@endsection