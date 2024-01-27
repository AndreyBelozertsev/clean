
<div class="bg-white px-6 py-8 rounded-standart">
    <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
        <h2 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Обновления</h2>
        <a class="text-other-b font-inter-500 py-[14px] px-3 pl-0 sm:pr-6 sm:pl-8" href="{{ route('landfill.index') }}">
            Все свалки
            <img class="inline-block ml-1" src="/img/icons/vuesax.svg" alt="vuesax">
        </a>
    </div>
    <div>
        <div class="flex gap-5 mb-5 text-white flex-wrap">
            @foreach ($categories as $category)
                <a href="{{ route('landfill.index', ['category' => $category->slug]) }}" class="text-sm sm:text-lg py-2 px-2 sm:px-4 rounded-standart custom-bg-{{ config('const.landfill_category.colors.' . $category->slug, 'fuchsia-500')   }}">
                    {{ $category->title }}
                </a>
            @endforeach
        </div>
        <div class="grid xl:grid-cols-2 gap-x-4 gap-y-5">
            @foreach($landfills as $landfill)
                <x-landfill.landfill-list-item :landfill="$landfill" />
            @endforeach
        </div>
    </div>
</div>
