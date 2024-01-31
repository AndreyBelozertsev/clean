<div class="row-span-2 justify-between mr-4 hidden cols 3xl:col-span-5 3xl:flex 5xl:col-span-4">
    @foreach($landfill_statistic as $category)
        <div class="bg-no-repeat bg-contain relative pt-3 px-2 pb-[14px] w-full max-w-[154px] rounded-b-[20px]" style="
        background-image: linear-gradient(rgba(255, 255, 255, 0 ) 0%, rgba(255, 255, 255, 0 ) 50%, #fff 51%, #fff 100%),
                                url(/images/icons/subtract.svg);">
        
            <h5 class="mb-4 text-xl font-inter-700">{{ $category->landfills_count  }}</h5>
            <p class="text-sm/[1] tracking-[-0.7px]">{{ $category->title }}</p>
            <div class="absolute top-0 overflow-hidden right-0 w-[30px] h-[30px] flex justify-center items-center rounded-[50%] custom-bg-{{ config('const.landfill_category.colors.' . $category->slug, 'fuchsia-500') }}" >
                <img class="h-10 w-10" alt="" src="{{ isset($category->thumbnail) ? Storage::disk('public')->url($category->thumbnail) : '' }}">
            </div>
        </div>
    @endforeach
</div>
