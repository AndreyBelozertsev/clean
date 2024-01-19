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

	<link rel="icon" href="/template/favicon/favicon.ico" type="image/x-icon">
  	<link rel="shortcut icon" href="/template/favicon/favicon.ico" type="image/x-icon">

	<link rel="mask-icon" href="./images/safari-pinned-tab.svg" color="#1E1F43">

	<meta name="msapplication-TileColor" content="#1E1F43">
	<meta name="theme-color" content="#1E1F43">

	<script src="https://api-maps.yandex.ru/v3/?apikey={{ env('MOONSHINE_YANDEX_MAP_API') }}&lang=ru_RU"></script>
    @vite(['resources/css/app.css', 'resources/css/scss/main.scss'])
	
</head>

<body class="bg-brand">
	<!-- Site header -->
	<header>
		@include('partials.top-navigation-menu')
	</header>
	<div>
		<x-landfill.landfills-statistic />
		<x-meeting.meeting-next />
		<div>
			<a href="{{ route('landfill.create') }}">Заявить о незаконной свалке</a>
		</div>
		<div>
			<form action="{{ route('search') }}">
				<input class="border border-red-600" type="text" name="search">
				<button type="submit">найти</button>
			</form>
		</div>
	</div>	
	@yield('content')
	<!-- Site footer -->
	<footer class="bg-brand py-8">
		<div class="container">
			<div class="hidden lg:flex gap-24 pb-8">
			</div>
		</div>
	</footer>
	@vite(['resources/js/app.js'])
   
</body>
</html>