@extends('layouts.app')

@section('content')
    page.volunteer.create
    <form action="{{ route('volunteer.store') }}" enctype='multipart/form-data' x-data="useForm" x-on:submit.prevent="post">
        @csrf
        <div
            class="form-response"
            style="display: none"
            x-show="response?.success"
            x-bind:class="response.success ? 'success' : 'error'"
            x-text="response?.message"
            x-transition
        ></div>
        <div>
            <label for="name">Имя</label>
            <input id="name" class="border border-red-500" type="text" name="name" value="{{ old('name') }}">
            <x-input-error name="name" />
        </div>
        <div>
            <label for="phone">Номер телефона</label>
            <input id="phone" class="border border-red-500" type="text" name="phone" value="{{ old('phone') }}">
            <x-input-error name="phone" />
        </div>

        <div>
            <label for="content"></label>O себе <textarea name="content" class="border border-red-500" id="content" cols="30" rows="10" value="{{ old('content') }}"></textarea>
            <x-input-error name="content" />
        </div>
        <div>
            <label for="thumbnail">Фото</label>
            
            <input id="thumbnail" type="file" name="thumbnail"  value="{{ old('thumbnail') }}">
            <x-input-error name="thumbnail" />
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
    endpage.volunteer.create
@endsection 

