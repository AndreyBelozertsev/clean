@extends('layouts.app')

@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="bg-white px-6 py-8 rounded-standart">
                <div class="pb-8">
                    <div class="py-[5px] mb-6 md:mb-10">
                        <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl pb-4">{{ $landfill->address }}</h1>
                        @if($landfill->city)
                            <p>
                                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                    {{ $landfill->city->title }}
                                </span>
                            </p>
                        @endif

                    </div>
                    <p class="py-2 px-3 mb-4 rounded-standart text-sm text-white w-fit flex gap-1 items-center custom-bg-{{ config('const.landfill_category.colors.' . $landfill->category->slug, 'fuchsia-500') }}">
                        <span>{{ $landfill->category->title }}</span>
                        <img alt="{{ $landfill->category->title }}" src="{{ isset($landfill->category->thumbnail) ? Storage::disk('public')->url($landfill->category->thumbnail) : '' }}">
                    </p>
                    <div class="text-xs font-inter-600 mb-4">
                        <p>
                            Добавлена: 
                            <span class="font-inter-300">{{ getHumanDate($landfill->created_at)  }}</span>
                        </p>
                        <p>
                            Обновлена: 
                            <span class="font-inter-300">{{ getHumanDate($landfill->updated_at)  }}</span>
                        </p>
                    </div>
                    @if($landfill->content)
                        <div class="content mb-4">
                            {!! $landfill->content !!}
                        </div>
                    @endif
                </div>
                @if($landfill->images && count($landfill->images))
                    <div>
                        <div class="md:px-16 relative">
                            <div class="swiper swiper-default gallery-slider" style="padding:0 32px 40px 32px">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @foreach($landfill->images as $image)
                                        <a class="swiper-slide" href="{{ asset('storage/' . $image) }}">
                                            <div class="rounded-lg overflow-hidden">
                                                <div>
                                                    <img src="{{ makeThumbnail('storage/' . $image, '518x320', 'fit') }}" alt="slide">
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="swiper-controls">
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="mb-10 md:mb-20">
        <div class="container">
            <div class="bg-white rounded-standart px-6 py-8">
                <div class="flex justify-between items-center">
                    <h4 class="font-inter-800 text-2xl mb-2 md:mb-4">
                        На карте
                    </h4>
                </div>
                <div 
                    class="w-full rounded-standart h-52 sm:h-80 xl:h-[550px] overflow-hidden" 
                    id="landfill-map-full"
                    data-landfills="{{ collect(['landfills' => [$landfill]])->toJson() }}"
                    ></div>
            </div>
        </div>
    </section>
@endsection