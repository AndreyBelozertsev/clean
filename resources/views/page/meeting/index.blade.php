@extends('layouts.app')
@section('content')
    <main class="mt-10 mb-20">
        <section>
            <div class="container">
                <div class="bg-white px-2 md:px-6 py-8 rounded-standart">
                    <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
                        <h2 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Наши субботники</h2>
                        <a class="text-other-blue font-inter-500 py-[14px] pr-3 pl-0 lg:pr-6 lg:pl-8" href="{{ route('meeting-map.index') }}">
                            Показать на карте
                            <img class="inline-block ml-1" src="/images/icons/vuesax.svg" alt="vuesax">
                        </a>
                    </div>
                    <div class="mb-6 md:mb-10">
                        <x-meeting.meeting-next />
                    </div>
                    <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-5">
                        @foreach ($meetings as $meeting)
                            @php
                                $img = asset('/images/no-img.svg');
                                if($meeting->thumbnail){
                                    $img = makeThumbnail('storage/' . $meeting->thumbnail, 'nullx600');
                                    
                                }
                            @endphp
                            <div class="p-2 bg-custom-gray rounded-standart min-h-[350px] hover:bg-default-hover duration-500 transition ease-in-out">
                                <div class="h-[200px] overflow-hidden rounded-standart">
                                    <a href="{{ route('meeting.show', ['slug' => $meeting->slug]) }}">
                                        <img class="w-full h-full object-cover" src="{{ $img }}" alt="{{ $meeting->address }}">
                                    </a>
                                </div>
                                <div class="p-2 w-full">
                                    <h2 class="text-xl font-inter-700 mb-4">
                                        <a href="{{ route('meeting.show', ['slug' => $meeting->slug]) }}">{{ $meeting->title  }}</a>
                                    </h2>
                                    <p class="text-sm/[1] pb-4">
                                        {{ $meeting->city?->title . ", " }} {{ $meeting->address }}
                                    </p>
                                    <p class="text-xs font-inter-600">
                                        Начало: 
                                        <span class="font-inter-300">{{ getHumanDate($meeting->start_at, true) }}</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        {{ $meetings->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


