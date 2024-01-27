<div class="bg-premium rounded-standart px-6 py-5 flex flex-col justify-between col-span-3 row-span-2 mb-10 xl:mb-0 3xl:row-span-5 3xl:col-span-1">
    <a class="bg-white flex w-10 h-10 rounded-[50%] justify-center items-center ml-auto" href="{{ route('volunteer.index') }}">
        <img data-src="img/icons/arrow-up-right-accent.svg" src="img/1x1.png" alt="arrow top">
    </a>
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-inter-800 mb-10 3xl:mb-5">Волонтёры</h2>
    <div class="gap-8 flex justify-around flex-wrap 3xl:grid">
        @foreach($volunteers as $volunteer)
            @if($loop->iteration % 2)
                <div class="flex items-start gap-6">
                    <div class="py-1 pb-2 order-1 3xl:order-none">
                        <h2 class="text-xl font-inter-700 mb-4">
                            {{ $volunteer->name }}
                        </h2>
                        <p class="text-sm/[1] max-w-[164px]">
                        </p>
                    </div>
                    <div class="max-h-[84px] max-w-[84px] w-full h-full border-[3px] border-accent-b p-1 rounded-[50%]">
                        <img class="rounded-[50%] h-full w-full" src="img/volunteers/2.jpg" alt="{{ $volunteer->name }}">
                    </div>
                </div>
            @else
                <div class="flex items-start gap-6">
                    <div class="max-h-[84px] max-w-[84px] w-full h-full border-[3px] border-accent-b p-1 rounded-[50%]">
                        <a href="#">
                            <img class="rounded-[50%] h-full w-full" src="img/volunteers/1.jpg" alt="{{ $volunteer->name }}">
                        </a>    
                    </div>
                    <div class="py-1 pb-2">
                        <h2 class="text-xl font-inter-700 mb-4">
                            <a href="#">
                                {{ $volunteer->name }}
                            </a>
                        </h2>
                        <p class="text-sm/[1] max-w-[164px]">
                            
                        </p>
                    </div>
                </div>    
            @endif
        @endforeach
    </div>
</div>