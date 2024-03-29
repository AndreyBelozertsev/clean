@props([
    'landfill'
])

@php
    $img = asset('/images/no-img.svg');
    if(isset($landfill->images[0])){
        $img = makeThumbnail('storage/' . $landfill->images[0], 'nullx600');
    }
@endphp

<div class="grid lg:grid-cols-thumb-block px-0 py-2 lg:p-2 bg-custom-gray rounded-standart gap-3 flex-wrap lg:flex-nowrap sm:justify-normal hover:bg-default-hover duration-500 transition ease-in-out">
    <div class="rounded-[24px] h-[250px] lg:w-[200px] lg:h-[200px] overflow-hidden">
        <a href="{{ route('landfill.show',['slug' => $landfill->slug]) }}">
            <img class="w-full h-full object-cover" alt="{{ $landfill->address }}" src="{{ $img }}">
        </a>
    </div>
    <div class="py-2.5 px-1 md:px-2 lg:px-0 flex flex-col justify-between">
        <h4 class="font-inter-600 uppercase tracking-[-0.8px] mb-2.5 leading-none">
            <a href="{{ route('landfill.show',['slug' => $landfill->slug]) }}">{{ $landfill->address }}</a>
        </h4>
        <p class="text-[15px] mb-4 leading-none">{{ $landfill->city->title }}</p>
        <a href="{{ route('landfill.index',['category' => $landfill->category->slug]) }}" class="py-2 px-3 mb-4 rounded-standart text-sm text-white w-fit flex gap-1 items-center custom-bg-{{ config('const.landfill_category.colors.' . $landfill->category->slug, 'fuchsia-500') }}">
            <span>{{ $landfill->category->title }}</span>
            <img alt="{{ $landfill->category->title }}" src="{{ isset($landfill->category->thumbnail) ? Storage::disk('public')->url($landfill->category->thumbnail) : '' }}">
        </a>
        <div class="text-xs font-inter-600">
            <p>
                Добавлена: 
                <span class="font-inter-300">{{ getHumanDate($landfill->created_at) }}</span>
            </p>
            <p>
                Обновлена: 
                <span class="font-inter-300">{{ getHumanDate($landfill->updated_at) }}</span>
            </p>
        </div>
    </div>
</div>