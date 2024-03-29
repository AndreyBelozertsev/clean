@extends('layouts.app')
@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="bg-white px-2 md:px-6 py-8 rounded-standart">
                <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
                    <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Новости</h1>
                </div>
                <div class="mb-32 text-center md:text-left grid gap-4">
                    @forelse($articles as $article)
                        @php
                            $img = asset('/images/no-img.svg');
                            if($article->thumbnail){
                                $img = makeThumbnail('storage/' . $article->thumbnail, 'nullx600');
                            }
                        @endphp
                        <div class="grid lg:grid-cols-3 gap-0 bg-custom-gray px-0 py-2 md:px-2 rounded-standart hover:bg-default-hover duration-500 transition ease-in-out">
                            <a class="block rounded-t-[24px] lg:rounded-[24px] w-full bg-cover bg-center min-h-[250px]" 
                                style="background-image: linear-gradient(100.95deg, rgba(0, 0, 0, 0.8) -1.21%, rgba(0, 0, 0, 0) 97.63%),
                                url({{ $img }});" 
                                href="{{ route('article.show', ['slug' => $article->slug]) }}"
                            >
                            </a>
                            <div class="p-6 lg:col-span-2">
                                <a href="{{ route('article.show', ['slug' => $article->slug]) }}">
                                    <h2 class="font-inter-600 uppercase tracking-[-0.8px] mb-2.5 leading-none">{{ $article->title }}</h2>
                                </a>
                                <div class="text-left text-[15px] mb-4 leading-none">
                                    {!! $article->description !!}
                                </div>
                                <div class="text-xs font-inter-600 mb-8">
                                    <p>
                                        Опубликовано: 
                                        <span class="font-inter-300">{{ getHumanDate($article->created_at)  }}</span>
                                    </p>
                                </div>
                                <div>
                                    <a class="text-other-blue font-inter-500" href="{{ route('article.show', ['slug' => $article->slug]) }}">
                                        Подробнее
                                        <img class="inline-block ml-1" src="/images/icons/vuesax.svg" alt="vuesax">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                    <div>
                        {{ $articles->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection