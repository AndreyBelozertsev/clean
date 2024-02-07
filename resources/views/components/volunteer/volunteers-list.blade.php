<div class="bg-premium rounded-standart px-2 md:px-6 py-5 flex flex-col justify-between col-span-3 row-span-2 mb-10 xl:mb-0 3xl:row-span-5 3xl:col-span-1 hover:bg-premium-hover duration-500 transition ease-in-out">
    <a class="bg-white flex w-10 h-10 rounded-[50%] justify-center items-center ml-auto" href="{{ route('volunteer.index') }}">
        <img data-src="/images/icons/arrow-up-right-accent.svg" src="/images/1x1.png" alt="arrow top">
    </a>
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-inter-800 mb-10 3xl:mb-5">Добровольцы</h2>
    <div class="gap-8 flex justify-around flex-wrap 3xl:grid">
        @foreach($volunteers as $volunteer)
            @php
                $img = asset('/images/no-img.svg');
                if($volunteer->thumbnail){
                    $img = makeThumbnail('storage/' . $volunteer->thumbnail, '600x600', 'fit');
                }
            @endphp
            @if($loop->iteration % 2)
                <div class="flex items-start gap-6">
                    <div class="py-1 pb-2 order-1 3xl:order-none">
                        <h3 class="text-xl font-inter-700 mb-2">
                            <a href="{{ route('volunteer.show', ['slug' => $volunteer->slug]) }}">{{ $volunteer->name   }}</a>
                        </h3>
                        <p class="text-xs text-accent-blue font-inter-600 mb-2">
                            Баллов: 
                            <span class="font-inter-300">{{ $volunteer->meetings_sum_scores ? $volunteer->meetings_sum_scores : 0 }}</span>
                        </p>
                        <p class="text-sm/[1] max-w-[164px]">
                        </p>
                    </div>
                    <div class="max-h-[84px] max-w-[84px] w-full h-full border-[3px] border-accent-blue p-1 rounded-[50%]">
                        <a href="{{ route('volunteer.show', ['slug' => $volunteer->slug]) }}">
                            <img class="rounded-[50%] h-full w-full" src="{{ $img }}" alt="{{ $volunteer->name }}">
                        </a>    
                    </div>
                </div>
            @else
                <div class="flex items-start gap-6">
                    <div class="max-h-[84px] max-w-[84px] w-full h-full border-[3px] border-accent-blue p-1 rounded-[50%]">
                        <a href="{{ route('volunteer.show', ['slug' => $volunteer->slug]) }}">
                            <img class="rounded-[50%] h-full w-full" src="{{ $img }}" alt="{{ $volunteer->name  }}">
                        </a>    
                    </div>
                    <div class="py-1 pb-2">
                        <h2 class="text-xl font-inter-700 mb-2">
                            <a href="{{ route('volunteer.show', ['slug' => $volunteer->slug]) }}">
                                {{ $volunteer->name }}
                            </a>
                        </h2>
                        <p class="text-xs text-accent-blue font-inter-600 mb-2">
                            Баллов: 
                            <span class="font-inter-300">{{ $volunteer->meetings_sum_scores ? $volunteer->meetings_sum_scores : 0 }}</span>
                        </p>
                        <p class="text-sm/[1] max-w-[164px]">
                            
                        </p>
                    </div>
                </div>    
            @endif
        @endforeach
    </div>
</div>