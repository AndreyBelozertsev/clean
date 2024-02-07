
<div class="bg-white px-2 md:px-6 py-8 rounded-standart">
    <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
        <h2 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Карта свалок</h2>
        <a class="text-other-blue font-inter-500 py-[14px] pr-3 pl-0 lg:pr-6 lg:pl-8" href="{{ route('landfill.index') }}">
            Показать списком
            <img class="inline-block ml-1" src="/images/icons/vuesax.svg" alt="vuesax">
        </a>
    </div>
    <div>
        <div class="filter-block flex gap-5 mb-5 text-white flex-wrap">
            <button data-slug='all' class="filter-button text-sm sm:text-lg py-2 px-2 sm:px-4 rounded-standart text-default bg-premium">
                Показать все свалки
            </button>
            @foreach($categories as $category)
                <button data-slug='{{ $category->slug }}' class="filter-button text-sm sm:text-lg py-2 px-2 sm:px-4 rounded-standart custom-bg-{{ config('const.landfill_category.colors.' . $category->slug, 'fuchsia-500') }}">
                    {{ $category->title  }}
                </button>
            @endforeach
        </div>
        <div class="w-full rounded-standart h-52 sm:h-80 xl:h-[550px] overflow-hidden" id="landfill-map-full"></div>
    </div>
</div>
