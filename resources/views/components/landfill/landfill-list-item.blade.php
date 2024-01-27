@props([
    'landfill'
])

<div class="grid-cols-1 p-2 bg-gray rounded-standart flex gap-3 flex-wrap md:flex-nowrap justify-center sm:justify-normal">
    <img class="rounded-[24px]" alt="{{ $landfill->address }}" src="{{ isset($landfill->images[0]) ? Storage::disk('public')->url($landfill->images[0]) : '/img/updates/1.jpg' }}">
    <div class="py-2.5 flex flex-col justify-between">
        <h4 class="font-inter-600 uppercase tracking-[-0.8px] mb-2.5 leading-none">
            <a href="{{ route('landfill.show',['slug' => $landfill->slug]) }}">{{ $landfill->address  }}</a>
        </h4>
        <p class="text-[15px] mb-4 leading-none">{{ $landfill->city->title }}</p>
        <a href="{{ route('landfill.index',['category' => $landfill->category->slug]) }}" class="py-2 px-3 mb-4 rounded-standart text-sm text-white w-fit flex gap-1 items-center custom-bg-{{ config('const.landfill_category.colors.' . $landfill->category->slug, 'fuchsia-500') }}">
            <span>{{ $landfill->category->title }}</span>
            <img  alt="{{ $landfill->category->title }}" src="{{ isset($landfill->category->thumbnail) ? Storage::disk('public')->url($landfill->category->thumbnail) : '' }}">
        </a>
        <div class="text-xs font-inter-600">
            <p>
                Добавлена: 
                <span class="font-inter-300">12.12.2023</span>
            </p>
            <p>
                Обновлена: 
                <span class="font-inter-300">12.01.2024</span>
            </p>
        </div>
    </div>
</div>