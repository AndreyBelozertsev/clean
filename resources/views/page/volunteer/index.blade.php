@extends('layouts.app')
@section('content')
<main class="mt-10 mb-20">
    <section>
        <div class="container">
            <div class="bg-white px-6 py-8 rounded-standart">
                <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
                    <h2 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Добровольцы</h2>
                    <a class="text-other-blue font-inter-500 py-[14px] px-3 pl-0 sm:pr-6 sm:pl-8" href="{{ route('volunteer.create') }}">
                        Стать добровольцем
                        <img class="inline-block ml-1" src="/images/icons/vuesax.svg" alt="vuesax">
                    </a>
                </div>
                <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-5">
                    @foreach ($volunteers as $volunteer)
                        @php
                            $img = asset('/images/no-img.svg');
                            if($volunteer->thumbnail){
                                $img = makeThumbnail('storage/' . $volunteer->thumbnail, '600x600' );
                            }
                        @endphp
                        <div class="p-2 bg-premium rounded-standart flex gap-3 items-center flex-wrap flex-col md:flex-nowrap justify-center">
                            <a href="{{ route('volunteer.show', ['slug' => $volunteer->slug]) }}" class="block max-h-[200px] max-w-[200px] w-full h-full border-[3px] border-accent-blue p-1 rounded-[50%]">
                                <img class="rounded-[50%] h-full w-full" src="{{ $img }}" alt="{{ $volunteer->title  }}">
                            </a>
                            <div class="p-2 w-full">
                                <p class="text-xs text-accent-blue font-inter-600 mb-2">
                                    Баллов: 
                                    <span class="font-inter-300">{{ $volunteer->meetings_sum_scores ? $volunteer->meetings_sum_scores : 0 }}</span>
                                </p>
                                <h2 class="text-xl font-inter-700 mb-4">
                                    <a href="{{ route('volunteer.show', ['slug' => $volunteer->slug]) }}">{{ $volunteer->name  }}</a>
                                </h2>
                                <p class="text-sm pb-4">
                                    {{ $volunteer->content }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $volunteers->onEachSide(2)->links() }}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection