@extends('layouts.app')

@section('content')
    <form action="">
    <div class="py-2">
        <input type="email" name="email" >
    </div>
    @error('email')
  
            {{ $message }}
       
    @enderror
    <div class="py-2">
        <input class="py-3" type="password" placeholder="Пароль" name="password"/>
    </div>


    <button type="submit">Вход</button>

  
        <div class="space-y-3 mt-5">
            <div class="text-xxs md:text-xs"><a href="{{ route('password.forgot') }}" class="text-white hover:text-white/70 font-bold">Забыли пароль?</a></div>
        </div>
    </form>

@endsection