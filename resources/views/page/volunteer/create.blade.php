@extends('layouts.app')

@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="bg-white px-2 md:px-6 py-8 rounded-standart">
                <div class="py-[5px] mb-6 md:mb-10">
                    <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl mb-2 md:mb-4">Заполни анкету и присоеденись к нашей команде</h1>
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
                            <div class="mb-4">
                                <label>
                                    <span class="text-step-txt mb-2 inline-block">Имя
                                        <span class="text-accent-red ml-1">*</span>
                                    </span>
                                    <input name="name" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full active:border-default-active focus:border-default-active focus:outline-none focus:ring-1 focus:ring-border-default-active" type="text"
                                    placeholder="Укажите ваше имя" required>
                                </label>
                                <x-input-error name="name" />
                            </div>
                            <div class="mb-4" id="crop_block">
                                <div class="thumbnail-container h-[350px] w-[60%] mx-auto border border-accent-g mb-5 hidden">
                                    <img class="h-full w-full" src="" alt="" id="image-crop">
                                </div>
                                <div class="preview-container h-[250px] w-[250px] border border-accent-r mb-5 mx-auto hidden">
                                    <img class="h-full w-full object-cover" src="" alt="" id="preview-image">
                                </div>
                                <div class="flex gap-3">
                                    <input name="thumbnail" class="hidden" type="file" accept="image/*" id="thumbnail">
                                    <input name="crop[width]" class="hidden" type="text">
                                    <input name="crop[height]" class="hidden" type="text">
                                    <input name="crop[x]" class="hidden" type="text">
                                    <input name="crop[y]" class="hidden" type="text">

                                    <label
                                    class="block w-fit px-4 py-2 border border-accent-b rounded cursor-pointer"
                                    for="thumbnail">Выбрать фото</label>
                                    <button class="px-4 py-2 border border-accent-b rounded cursor-pointer hidden"
                                    id="preview-btn">Обрезать</button>
                                </div>
                                <x-input-error name="thumbnail" />
                            </div>
                            <div class="mb-4">
                                <label>
                                    <span class="text-step-txt mb-2 inline-block">Номер телефона
                                        <span class="text-accent-red ml-1">*</span>
                                    </span>
                                    <input name="phone" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full phone-number active:border-default-active focus:border-default-active focus:outline-none focus:ring-1 focus:ring-border-default-active" autocomplete="off" type="tel"
                                    placeholder="Укажите контактный номер" required>
                                </label>
                                <x-input-error name="phone" />
                            </div>


                            <div class="font-manrope-400 text-sm text-custom-gray mb-8">
                                <label class="mb-4 block">
                                    <span class="text-step-txt mb-2 inline-block">Муниципальное образование<span
                                        class="text-accent-red ml-1">*</span>
                                    </span>
                                    <select name="city_id" class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full active:border-default-active focus:border-default-active focus:outline-none focus:ring-1 focus:ring-border-default-active" required>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->title }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <div class="mb-4">
                                <label>
                                    <span class="text-step-txt mb-2 inline-block">Несколько слов о себе</span>
                                    <textarea
                                        name="content"
                                        class="py-3 px-4 border border-step-color rounded-[8px] text-step-color w-full bg-[#f8f8f8] max-h-12 active:border-default-active focus:border-default-active focus:outline-none focus:ring-1 focus:ring-border-default-active"
                                        placeholder="Дополнительная информация"></textarea>
                                </label>
                                <x-input-error name="content" />
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
                                        Согласен с <a class="underline" href="/policy">Политикой обработки персональных данных</a>
                                    </p>
                                    
                                </label>
                                <x-input-error name="agree" />
                            </div>
                        </div>
                        <button class="text-white py-[14px] px-8 bg-accent-blue rounded-huge w-full disabled:bg-gray-300 disabled:text-gray-500 disabled:cursor-not-allowed" type="submit">
                            Отправить анкету
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection 

