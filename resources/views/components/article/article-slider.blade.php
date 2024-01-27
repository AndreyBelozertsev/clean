<div class="bg-white rounded-standart px-6 pt-5 pb-8 col-span-2 flex flex-col justify-between row-span-4 mb-10 xl:mb-0">
    <a class="bg-accent-blue flex w-10 h-10 rounded-[50%] justify-center items-center ml-auto" href="{{ route('article.index') }}">
        <img data-src="img/icons/arrow-up-right.svg" src="img/1x1.png" alt="arrow top">
    </a>
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-inter-800 mb-10">Новости</h2>
    <div>
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach($articles as $article)
                    <div class="swiper-slide">
                        <div class="bg-no-repeat bg-cover rounded-standart p-8 pb-[192px]"
                            style="background-image: url('/img/news-bg.jpg')"
                        >
                            <h5 class="text-xl lg:text-2xl text-white font-inter-800">
                                Первый летний субботник
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-controls">
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</div>