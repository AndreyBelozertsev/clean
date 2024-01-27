
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
    <div class="grid xl:grid-cols-2 gap-x-4 gap-y-5">
        @foreach($landfills as $landfill)
            <x-landfill.landfill-list-item :landfill="$landfill" />
        @endforeach
    </div>
</div>
