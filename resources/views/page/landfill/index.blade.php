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
                <div>
                    <div class="flex gap-5 mb-5 text-white flex-wrap">
                        @if( request()->has('category') )
                            <a href="{{ route('landfill.index') }}" class="filter-button text-sm sm:text-lg py-2 px-2 sm:px-4 rounded-standart text-default bg-premium">
                                Показать все свалки
                            </a>
                        @endif
                        @foreach ($categories as $category)
                            <a href="{{ route('landfill.index', ['category' => $category->slug]) }}" class="text-sm sm:text-lg py-2 px-2 sm:px-4 rounded-standart custom-bg-{{ config('const.landfill_category.colors.' . $category->slug, 'fuchsia-500')   }}">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                    <div class="grid 2xl:grid-cols-2 gap-x-4 gap-y-5">
                        @foreach($landfills as $landfill)
                            <x-landfill.landfill-list-item :landfill="$landfill" />
                        @endforeach
                    </div>
                    <div>
                        {{ $landfills->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection