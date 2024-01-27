@extends('layouts.app')

@section('content')
    Главная страница
<main class="mt-10 mb-20">
    <section>
        <div class="container">
            <div class="gap-6 grid-cols-3 grid-rows-8 xl:grid 3xl:grid-rows-5 3xl:grid-cols-4">
                <div class="bg-white rounded-standart px-6 pt-5 pb-8 col-span-1 flex flex-col justify-between row-span-4 mb-10 xl:mb-0">
                    <a class="bg-accent-blue flex w-10 h-10 rounded-[50%] justify-center items-center ml-auto" href="{{ route('meeting.index') }}">
                        <img data-src="img/icons/arrow-up-right.svg" src="img/1x1.png" alt="arrow top">
                    </a>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-inter-800 mb-10 xl:mb-auto">Наши <br> субботники</h2>
                    <div class="relative h-[145px] flex justify-center mb-auto 5xl:mb-0">
                        <div class="p-2.5 rounded-[16px] bg-premium absolute w-[77.195%] h-[92px] top-[-13px]"></div>
                        <div class="py-9 px-4 bg-accent-blue rounded-[16px] text-white text-lg lg:text-xl font-inter-500 absolute">
                        Рассказываем, как проходят субботники и что нужно для участия
                        </div>
                    </div>
                </div>
                <x-article.article-slider />
                <x-volunteer.volunteers-list />
                <div class="bg-white rounded-standart px-6 py-5 col-span-3 flex items-center row-span-2 3xl:row-span-1">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-inter-800">Экологическая грамотность</h2>
                    <a class="bg-accent-blue flex w-10 h-10 rounded-[50%] justify-center items-center ml-auto flex-none" href="{{ route('question.index') }}">
                        <img data-src="img/icons/arrow-up-right.svg" src="img/1x1.png" alt="arrow top">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-10 md:mt-20">
        <div class="container">
            <x-landfill.landfills-map />
        </div>
    </section>
    <section class="mt-10 md:mt-20">
        <div class="container">
            <div class="bg-white px-6 py-8 rounded-standart">
                <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
                    <h2 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Обновления</h2>
                    <a class="text-other-blue font-inter-500 py-[14px] px-3 pl-0 sm:pr-6 sm:pl-8" href="{{ route('landfill.index') }}">
                        Все свалки
                        <img class="inline-block ml-1" src="/img/icons/vuesax.svg" alt="vuesax">
                    </a>
                </div>
                <x-landfill.landfills-list />
            </div>
        </div>
    </section>
  </main>
@endsection