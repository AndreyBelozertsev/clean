@extends('layouts.app')

@section('content')
    <section class="py-8 md:py-16">
        <div class="container">
            <div class="bg-white px-6 py-8 rounded-standart">
                <div class="py-[5px] mb-6 md:mb-10">
                    <h1 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl mb-2 md:mb-4">Заполни анкету и присоеденись к нашей команде</h1>
                </div>
                <div class="content">

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
                    <div >
                        <label for="thumbnail">Фото</label>
                        <input name="thumbnail" type="file" id="thumbnail" accept="image/*" >

                                <img class="image-crop w-full"  alt="" style="display: block; width:fit-content">


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
                    
                </div>
            </div>
            <form x-data="{imgsrc:null}" x-cloak>
                <label for="imgSelect">Select an Image:</label>
                <input type="file" id="imgSelect" accept="image/*" x-ref="myFile" @change="previewFile">
                <template x-if="imgsrc">
                    <div class="w-max">
                        <img :src="imgsrc" class="imgPreview image-crop">
                    </div>
                </template>
            </form>
        </div>
    </section>
    <script>


   function previewFile() {
      let file = this.$refs.myFile.files[0];
      if(!file || file.type.indexOf('image/') === -1) return;
      this.imgsrc = null;
      let reader = new FileReader();

      reader.onload = e => {
        this.imgsrc = e.target.result;
      }

      reader.readAsDataURL(file);
    
    }


    </script>
@endsection 

