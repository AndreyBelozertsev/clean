@extends('layouts.app')

@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="bg-white px-6 py-8 rounded-standart">
                <div class="py-[5px] mb-6 md:mb-10">
                    <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl mb-2 md:mb-4">Заполни анкету и присоеденись к нашей команде</h1>
                </div>
                <div class="w-max h-[400px]">
                    <img class="image-crop w-full h-full" src="/images/news-bg.jpg">
                </div>
                <div class="flex justify-center">
                    <form class="mb-8" action="{{ route('volunteer.store') }}" enctype='multipart/form-data' x-data="useForm" x-on:submit.prevent="post">
                        @csrf
                        <div
                            class="form-response"
                            style="display: none"
                            x-show="response?.success"
                            x-bind:class="response.success ? 'success' : 'error'"
                            x-text="response?.message"
                            x-transition
                        >
                        </div>
                        <div class="font-manrope-400 text-sm text-custom-gray mb-8">
                            <div class="mb-4 block">
                                <label>
                                    <span class="text-step-txt mb-2 inline-block">Имя
                                        <span class="text-accent-red ml-1">*</span>
                                    </span>
                                    <input name="name" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full" type="text"
                                    placeholder="Укажите ваше имя" required>
                                </label>
                                <x-input-error name="name" />
                            </div>
                            <div class="mb-4 block">
                                <label>
                                    <span class="text-step-txt mb-2 inline-block">Номер телефона
                                        <span class="text-accent-red ml-1">*</span>
                                    </span>
                                    <input name="phone" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full" type="tel"
                                    placeholder="Укажите контактный номер" required>
                                </label>
                                <x-input-error name="phone" />
                            </div>


                            <div class="font-manrope-400 text-sm text-custom-gray mb-8">
                                <label class="mb-4 block">
                                    <span class="text-step-txt mb-2 inline-block">Муниципальное образование<span
                                        class="text-accent-red ml-1">*</span>
                                    </span>
                                    <select name="city_id" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full" required>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->title }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <div class="mb-4 block">
                                <label>
                                    <span class="text-step-txt mb-2 inline-block">Несколько слов о себе</span>
                                    <textarea
                                        name="content"
                                        class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full bg-[#f8f8f8] max-h-12"
                                        placeholder="Дополнительная информация"></textarea>
                                </label>
                                <x-input-error name="content" />
                            </div>
                            <div class="font-manrope-400 text-sm mb-8">
                                <div class="mb-2">
                                    <p class="text-step-txt mb-2">Загрузите фотографии</p>
                                    <label class="mb-4 p-4 border border-dashed border-accent-blue w-full rounded-[6px] cursor-pointer block">
                                        <input class="img-input hidden" name="thumbnail" type="file" id="thumbnail" accept="image/*">
                                        <div class="img-place flex flex-col items-center">
                                        <img class="p-2 mb-3" src="img/icons/file-image.svg" alt="doc">
                                            <p class="text-sm text-default mb-1">
                                                <span class="mr-1 text-accent-blue">
                                                Выберите фото
                                                </span>
                                                или перетащите
                                            </p>
                                            <p class="text-xs">
                                                (Максимальный размер файла: 25 MB)
                                            </p>
                                        </div>
                                    </label>
                                </div>
                                <x-input-error name="thumbnail" />
                                <label class="preview p-4 w-full border border-step-color rounded-[12px] cursor-pointer block">
                                    <p class="mb-2 font-inter-700 overflow-ellipsis w-full whitespace-nowrap overflow-hidden">
                                        img_dlinnoenazvanie_chtoby_pokazanm.jpg</p>
                                    <p class="text-accent-blue">40% Загрузка · 8.77 MB</p>
                                </label>
                            </div>

                            <div>
                                <label class="checkbox-label mb-4 flex gap-2 items-center cursor-pointer">
                                    <input name="agree" class="checkbox-main hidden" type="checkbox" id="check">
                                    <div class="checkbox-label__inner flex justify-center items-center">
                                        <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 4.5L2.79898 6.65877C3.17543 7.11051 3.8585 7.1415 4.27431 6.72569L10 1" stroke="#02880B"
                                            stroke-linecap="round" />
                                        </svg>
                                    </div>
                                    <p class="w-full text-step-txt">
                                        Согласен с <a class="underline" href="#">Политикой обработки персональных данных</a>
                                    </p>
                                    <x-input-error name="agree" />
                                </label>
                            </div>
                        </div>
                        <button class="text-white py-[14px] px-8 bg-accent-blue rounded-huge w-full" type="submit">
                            Отправить анкету
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection 

