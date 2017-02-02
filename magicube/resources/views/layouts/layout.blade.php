<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="construção, casas, madeira, design">
		<meta name="description" content="Magicube é um novo conceito de construcao de casas de Madeira que asssenta nos principios da qualidade,simplicidade e adaptaptablidade do produto.">
		
		<meta property=”og:title” content=”@yield('title')”/>
		<meta property=”og:image” content=”/img/Pauner/Pauner0.JPG”/>
		<meta property=”og:description” content=”Magicube é um novo conceito de construcao de casas de Madeira que asssenta nos principios da qualidade,simplicidade e adaptaptablidade do produto.”/>

		<title>@yield('title')</title>
		
		<link rel="stylesheet" href="/css/css.css">
		<link rel="stylesheet" href="/css/animate.css">
		
		<script src="/js/jquery-3.1.1.min.js"></script>
		<script src="/js/device.min.js"></script>
		<script src="/js/blocksit.min.js"></script>
		<script src="/js/wow.min.js"></script>


	</head>
	<body>
		
@include('layouts.nav')
		
	<main class="@yield('main-class')">
@yield('content')
		<div class="clearfix"></div>
	</main>
		
@include('layouts.footer')
	</body>
</html>
