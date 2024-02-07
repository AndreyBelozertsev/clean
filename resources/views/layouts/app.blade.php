<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	
	<title>{{ isset($seo_information->title) ? $seo_information->title : env('APP_NAME') }}</title>
	<meta name="description" content="{{ isset($seo_information->description) ? $seo_information->description : '' }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<meta property="og:title" content="{{ isset($seo_information->title) ? $seo_information->title : env('APP_NAME') }}"/>
	<meta property="og:image" content="{{ isset($seo_information->open_graph) ? $seo_information->open_graph : '' }}"/>
	<meta property="og:description" content="{{ isset($seo_information->description) ? $seo_information->description : '' }}"/>

	<link rel="icon" href="/images/favicon.svg" type="image/x-icon">
  	<link rel="shortcut icon" href="/images/favicon.svg" type="image/x-icon">

	<link rel="mask-icon" href="./images/safari-pinned-tab.svg" color="#1E1F43">

	<meta name="msapplication-TileColor" content="#1E1F43">
	<meta name="theme-color" content="#1E1F43">

	<script src="https://api-maps.yandex.ru/v3/?apikey={{ env('MOONSHINE_YANDEX_MAP_API') }}&lang=ru_RU"></script>
    @vite(['resources/css/app.css', 'resources/css/scss/main.scss'])
	
</head>

<body class="bg-brand">
	<!-- Site header -->
	<header x-data="{
              active: false
            }" class="pt-1.5 xl:pt-6">
		@include('partials.top-navigation-menu')
	</header>	
	@yield('content')
	<!-- Site footer -->
	<footer class="mb-6">
		<div class="container">
		<div class="bg-white px-2 md:px-6 pt-8 pb-5 rounded-standart">
			<div class="flex justify-between gap-5 items-start pb-[50px] border-b border-other-g flex-wrap lg:flex-nowrap">
				<a class="footer__logo" href="/">
					<img src="/images/logo.png" alt="Чистый Крым">
				</a>
				<ul class="pt-2.5 font-inter-500 grid max-w-[1064px] gap-10 gap-y-1 sm:grid-cols-2 sm:order-1 lg:order-none xl:gap-y-3 xl:grid-cols-4 3xl:gap-x-20">
					@forelse ($menu->all() as $item)
						<li><a href="{{ $item->link() }}" class="text-base/[1] tracking-[-0.8px] hover:text-other-blue duration-500 transition ease-in-out"> {{ $item->label()  }}</a></li>
					@empty
					@endforelse
				</ul>
				<div class="flex gap-2">
					@if(isset( $setting['vk']) )
						<a href="{{ $setting['vk'] }}">
							<img src="/images/icons/vk.svg" class="rounded-[50%]" alt="Vkontakte">
						</a>
					@endif
					@if(isset( $setting['tg'] ) )
						<a href="{{ $setting['tg'] }}">
							<img src="/images/icons/telegram.svg" class="rounded-[50%]" alt="Telegram">
						</a>
					@endif
				</div>
			</div>
			<div class="mt-5 flex justify-between flex-wrap text-xs">
				@isset( $setting['organization'] )
					<p class="mb-5 xl:mb-0">
						©  {{ date('Y') . ', ' . $setting['organization'] }} проект "Чистый Крым". Все права защищены
					</p>
				@endisset
				<a href="/policy" class="pr-[18px]">
					Политика конфиденциальности
				</a>
			</div>
		</div>
		</div>
	</footer>
	@include('partials.modals')
	@vite(['resources/js/app.js'])
   
</body>
</html>