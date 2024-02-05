@extends('layouts.app')

@section('content')
    <br>Этап 1</br>
    <div class="hidden">
            <form action="{{ route('landfill.store.stage1') }}" enctype='multipart/form-data' x-data="useForm" x-on:submit.prevent="post">
                @csrf
                <input type="hidden" name="uuid" value="{{ $custom_uuid }}">
                <div
                    class="form-response"
                    style="display: none"
                    x-show="response?.success"
                    x-bind:class="response.success ? 'success' : 'error'"
                    x-text="response?.message"
                    x-transition
                ></div>
                <div>
                    <label for="address">Адрес</label>
                    <input id="address" class="border border-red-500" type="text" name="address" value="{{ old('address') }}">
                    <x-input-error name="address" />
                </div>
                <div>
                    <label for="coordinates">Координаты</label>
                    <div id="landfill-map-single" class="w-[500px] h-[500px]"></div>
                    <x-input-error name="coordinates" />
                    <input id="coordinates" type="hidden" name="coordinates" value="{{ old('coordinates') }}">
                </div>
                <div>
                    <label for="city_id">МО</label>
                    <select class="border border-red-500" name="city_id" id="city_id">
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->title }}</option>
                        @endforeach
                    </select>
                    <x-input-error name="city_id" />
                </div>
                <button class="border border-red-500" type="submit">Отправить</button>
            </form>
            <br>Этап 2<br>
            <form action="{{ route('landfill.store.stage2') }}" enctype='multipart/form-data' x-data="useForm" x-on:submit.prevent="post">
                @csrf
                @dump($custom_uuid )
                <input type="hidden" name="uuid" value="{{ $custom_uuid }}">
                <div
                    class="form-response"
                    style="display: none"
                    x-show="response?.success"
                    x-bind:class="response.success ? 'success' : 'error'"
                    x-text="response?.message"
                    x-transition
                ></div>
                <div>
                    <label for="images">Фото</label>
                    
                    <input id="images" type="file" name="images[]" multiple="multiple" value="{{ old('images') }}">
                    <x-input-error name="images" />
                </div>

                <button class="border border-red-500" type="submit">Отправить</button>
            </form>
            <br>Этап 3<br> 
            <form action="{{ route('landfill.store.stage3') }}" enctype='multipart/form-data' x-data="useForm" x-on:submit.prevent="post">
                @csrf
                @dump($custom_uuid )
                <input type="hidden" name="uuid" value="{{ $custom_uuid }}">
                <div
                    class="form-response"
                    style="display: none"
                    x-show="response?.success"
                    x-bind:class="response.success ? 'success' : 'error'"
                    x-text="response?.message"
                    x-transition
                ></div>

                <div>
                    <label for="name">Ваше имя</label>
                    <input id="name" class="border border-red-500" type="text" name="name" value="{{ old('name') }}">
                    <x-input-error name="name" />
                </div>
                <div>
                    <label for="phone">Ваш номер телефона</label>
                    <input id="phone" class="border border-red-500" type="text" name="phone" value="{{ old('phone') }}">
                    <x-input-error name="phone" />
                </div>
                <div>
                    <label for="content">Краткое описание</label>
                    <textarea name="content" class="border border-red-500" id="content" cols="30" rows="10" value="{{ old('content') }}"></textarea>
                    <x-input-error name="content" />
                </div>
                <button class="border border-red-500" type="submit">Отправить</button>
            </form>
    </div>

    <form class="mb-8" action="#">
        <div class="font-manrope-400 text-sm mb-8">
          <div class="mb-2">
            <p class="text-step-txt mb-2">Загрузите фотографии</p>
            <input id="img-input" class="img-input hidden" type="file" multiple />
            <label class="mb-4 p-4 border border-dashed border-accent-b w-full rounded-[6px] cursor-pointer block img-label">
              <div class="img-place flex flex-col items-center gri">
                <img class="p-2 mb-3" src="/images/icons/file-image.svg" alt="doc">
                <p class="text-sm text-default mb-1">
                  <span class="mr-1 text-accent-b">
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
        </div>
        <button class="popup-complaint-btn text-white py-[14px] px-8 bg-accent-b rounded-huge w-full" type="submit">
          Продолжить
        </button>
      </form>

    endpage.landfill.create
@endsection 

