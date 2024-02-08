@props([
    'images' => []
])

<div>
    <div class="md:px-16 relative">
        <div class="swiper swiper-default gallery-slider" style="padding:0 32px 40px 32px">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach($images as $image)
                    <a class="swiper-slide" href="{{ asset('storage/' . $image) }}">
                        <div class="rounded-lg overflow-hidden">
                            <div>
                                <img src="{{ makeThumbnail('storage/' . $image, '518x320', 'fit') }}" alt="slide">
                            </div>
                        </div>
                    </a>
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