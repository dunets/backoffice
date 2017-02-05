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
		
		<link rel="apple-touch-icon" sizes="57x57" href="/img/itens/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/img/itens/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/img/itens/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/img/itens/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/img/itens/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/img/itens/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/img/itens/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/img/itens/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/img/itens/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/img/itens/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/itens/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/img/itens/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/itens/favicon-16x16.png">
<link rel="manifest" href="/img/itens/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/img/itens/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
		
		<link rel="stylesheet" href="/css/css.css">
		<link rel="stylesheet" href="/css/animate.css">
		
		<script src="/js/jquery-3.1.1.min.js"></script>
		<script src="/js/device.min.js"></script>
		<script src="/js/blocksit.min.js"></script>
		<script src="/js/wow.min.js"></script>


	</head>
	<body class="loading">
		
@include('layouts.nav')
	<div class="loader rotating"></div>
	<main class="@yield('main-class')">
@yield('content')
		<div class="clearfix"></div>
	</main>
		
@include('layouts.footer')
	</body>
</html>
