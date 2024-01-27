@extends('layouts.app')
@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="bg-white px-6 py-8 rounded-standart">
                <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
                    <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Новости</h1>
                </div>
                <div class="mb-32 text-center md:text-left grid gap-4">
                    @forelse($articles as $article)
                        @php
                            $img = asset('images/no-img.jpg');
                            if($article->thumbnail){
                                $img = Storage::disk('public')->url($article->thumbnail);
                            }
                        @endphp
                        <div class="grid md:grid-cols-3 gap-0 bg-gray p-2 rounded-standart">
                            <a class="block rounded-t-[24px] md:rounded-[24px] w-full bg-cover bg-center min-h-[250px]" 
                                style="background-image: linear-gradient(180deg, rgba(221,217,249,.5) 0%, rgba(201,240,204,.5) 100%),
                                url({{ $img }});" 
                                href="{{ route('article.show', ['slug' => $article->slug]) }}"
                            >
                            </a>
                            <div class="p-6 md:col-span-2">
                                <a href="{{ route('article.show', ['slug' => $article->slug]) }}">
                                    <h2 class="font-inter-600 uppercase tracking-[-0.8px] mb-2.5 leading-none">{{ $article->title }}</h2>
                                </a>
                                <div class="text-left text-[15px] mb-4 leading-none">
                                    {!! $article->description !!}
                                </div>
                                <div class="text-xs font-inter-600 mb-8">
                                    <p>
                                        Опубликовано: 
                                        <span class="font-inter-300">{{ getHumanDate($article->created_at)  }} </span>
                                    </p>
                                </div>
                                <div>
                                    <a class="text-other-blue font-inter-500" href="http://127.0.0.1:8000/landfill">
                                        Подробнее
                                        <img class="inline-block ml-1" src="/img/icons/vuesax.svg" alt="vuesax">
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