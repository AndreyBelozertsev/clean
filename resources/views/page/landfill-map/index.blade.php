@extends('layouts.app')
@section('content')
<main class="mt-10 mb-20">
    <section>
        <div class="container">
            <div class="bg-white px-6 py-8 rounded-standart">
                <x-landfill.landfills-map />
            </div>
        </div>
    </section>
</main>
@endsection