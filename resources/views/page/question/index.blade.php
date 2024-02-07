@extends('layouts.app')
@section('content')
    <main class="mt-10 mb-20">
        <section>
            <div class="container">
                <div class="bg-white px-2 md:px-6 py-8 rounded-standart">
                    <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
                        <h2 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Экологическая грамотность</h2>
                    </div>
                    <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-5">
                        @foreach ($questions as $question)
                            @php
                                $img = asset('/images/no-img.svg');
                                if($question->thumbnail){
                                    $img = makeThumbnail('storage/' . $question->thumbnail, 'nullx600');
                                    
                                }
                            @endphp
                            <div class="p-2 bg-custom-gray rounded-standart min-h-[380px] hover:bg-default-hover duration-500 transition ease-in-out">
                                <div class="h-[200px] overflow-hidden rounded-standart">
                                    <a href="{{ route('question.show', ['slug' => $question->slug]) }}">
                                        <img class="w-full h-full object-cover" src="{{ $img }}" alt="{{ $question->title }}">
                                    </a>
                                </div>
                                <div class="p-2 w-full">
                                    <h2 class="text-xl font-inter-700 mb-4">
                                        <a href="{{ route('question.show', ['slug' => $question->slug]) }}">{{ $question->title  }}</a>
                                    </h2>
                                    <p class="text-sm/[1] pb-4">
                                        {{ $question->description }}
                                    </p>
                                    <p class="text-xs font-inter-600">
                                        Опубликовано: 
                                        <span class="font-inter-300">{{ getHumanDate($question->created_at) }}</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        {{ $questions->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


