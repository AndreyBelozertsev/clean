<br>components.landfill.landfills-map<br>
<div>
    <div class="filter-block">
        <button class="filter-button" data-slug='all'>Все</button>
        @foreach ($categories as $category)
            <button class="filter-button" data-slug='{{ $category->slug }}'>{{ $category->title }}</button>  
        @endforeach
    </div>
    <div class="w-[800px] h-[500px]" id="landfill-map-full"></div>
</div>
<br>endcomponents.landfill.landfills-map<br>