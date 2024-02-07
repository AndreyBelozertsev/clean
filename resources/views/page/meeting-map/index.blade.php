@extends('layouts.app')

@section('content')
    <main class="mt-10 mb-20">
        <section>
            <div class="container">
                <div class="bg-white px-2 md:px-6 py-8 rounded-standart">
                    <div class="flex justify-between items-center flex-wrap py-[5px] mb-6 md:mb-10">
                        <h2 class="font-inter-800 text-2xl sm:text-3xl lg:text-4xl">Наши субботники</h2>
                        <a class="text-other-blue font-inter-500 py-[14px] pr-3 pl-0 lg:pr-6 lg:pl-8" href="{{ route('meeting.index') }}">
                            Показать списком
                            <img class="inline-block ml-1" src="/images/icons/vuesax.svg" alt="vuesax">
                        </a>
                    </div>
                    <div class="mb-6 md:mb-10">
                        <x-meeting.meeting-next />
                    </div>
                    <div>
                        <div class="w-full rounded-standart h-52 sm:h-80 xl:h-[550px] overflow-hidden" id="meeting-map-full"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection