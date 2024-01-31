@extends('layouts.app')
@section('content')
<main class="mt-10 mb-20">
    <section>
        <div class="container">
            <div class="bg-white px-6 py-8 rounded-standart">
                <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
                    <h2 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Все свалки</h2>
                    <a class="text-other-blue font-inter-500 py-[14px] px-3 pl-0 sm:pr-6 sm:pl-8" href="{{ route('landfill-map.index') }}">
                        Смотреть на карте
                        <img class="inline-block ml-1" src="/images/icons/vuesax.svg" alt="vuesax">
                    </a>
                </div>
                <x-landfill.landfills-list />
            </div>
        </div>
    </section>
</main>
@endsection