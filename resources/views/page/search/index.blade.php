@extends('layouts.app')

@section('content')
<section class="py-8 md:py-16">
    <div class="container">
        <div class="bg-white px-2 md:px-6 py-8 rounded-standart">
            <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
                <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Результаты поиска</h1>
            </div>
            <div class="mb-6 md:mb-10">
                <div class="flex">
                    <p class="text-lg font-inter-400 mb-2">
                        по запросу: 
                        <span class="font-inter-800">
                            {{ request()->get('search') }}
                        </span>
                    </p>
                </div>
            </div>
            <div>
                <div class="grid 2xl:grid-cols-2 gap-x-4 gap-y-5">
                    @foreach($landfills as $landfill)
                        <x-landfill.landfill-list-item :landfill="$landfill" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection