@extends('layouts.app')

@section('content')
    @php
        $img = asset('/images/no-img.svg');
        if($volunteer->thumbnail){
            $img = makeThumbnail('storage/' . $volunteer->thumbnail, '600x600', 'fit');
        }
    @endphp
    <section class="pt-8 md:pt-16 mb-10 md:mb-20">
        <div class="container">
            <div class="grid lg:grid-cols-volunteer-block gap-8">
                <div class="bg-premium rounded-standart px-2 md:px-6 py-8 flex justify-center w-full h-full">
                    <div class="max-h-[400px] max-w-[400px]  lg:max-h-[250px] lg:max-w-[250px] w-full h-full border-[3px] border-accent-blue p-1 rounded-[50%]">
                        <img class="rounded-[50%] h-full w-full" src="{{ $img }}" alt="{{ $volunteer->name  }}">   
                    </div>
                </div>
                <div class="bg-white rounded-standart px-6 py-8">
                    <div class="py-[5px] mb-6 md:mb-10">
                        <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl mb-2 md:mb-4">{{ $volunteer->name }}</h1>
                        <p class="text-sm text-accent-blue font-inter-600 mb-2">
                            Баллов: 
                            <span class="font-inter-300">{{ $volunteer->meetings_sum_scores ? $volunteer->meetings_sum_scores : 0 }}</span>
                        </p>
                        @if($volunteer->city)
                            <p>
                                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">
                                    {{ $volunteer->city->title }}
                                </span>
                            </p>
                        @endif
                    </div>
                    <div class="content">
                        {!! $volunteer->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($volunteer->meetings->isNotEmpty())

        <section class="mb-10 md:mb-20">
            <div class="container">
                <div class="bg-white rounded-standart px-2 md:px-6 py-8">
                    <div class="flex justify-between items-center">
                        <h4 class="font-inter-800 text-2xl mb-2 md:mb-4">
                            Мои субботники
                        </h4>
                    </div>
                    <x-meeting.meeting-map data-meetings="{{ collect(['meetings' => $volunteer->meetings])->toJson() }}" />
                </div>
            </div>
        </section>
    @endif

@endsection