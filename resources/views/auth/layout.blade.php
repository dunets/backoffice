<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link href="{{ elixir('css/backoffice.css') }}" rel="stylesheet">

	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
	</script>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"</script>
	<![endif]-->
</head>
<body>
	<div class="container">
		<aside>
			<nav>
				<a href="{{ url('/home') }}">
					<div class="logo">
						<?xml version="1.0" encoding="utf-8"?>
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 142 15" style="enable-background:new 0 0 142 15;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:#FFFFFF;}
							</style>
						<path class="st0" d="M14.1,7.5c0,4.2-3.1,7.3-7.6,7.3H0V0.3l6.4,0C11.2,0.2,14.1,3.3,14.1,7.5z M3.5,11.5h2.9c2.4,0,4.1-1.6,4.1-4
							c0-2.6-1.6-4-4.1-4H3.5V11.5z"/>
						<path class="st0" d="M22.1,14.7h-3.5V0.3h3.5V14.7z"/>
						<path class="st0" d="M36.9,14.7H33L26.6,0.3h3.9L35,10.6l4.5-10.4h3.9L36.9,14.7z"/>
						<path class="st0" d="M53.9,12.5h-7l-1,2.3h-3.7l6.2-14.5h3.9l6.2,14.5h-3.7L53.9,12.5z M52.7,9.6l-2.3-5.4l-2.3,5.4H52.7z"/>
						<path class="st0" d="M77.2,14.7h-3.5l-7.3-8.9v8.9h-3.5V0.3h3.5l7.3,8.8V0.3h3.5V14.7z"/>
						<path class="st0" d="M93.5,0.3v3.2h-7.6V6h6.3v3h-6.3v2.5h7.6v3.2H82.4V0.3H93.5z"/>
						<path class="st0" d="M109.7,4.8h-3.5c0-0.7-0.9-1.7-2.3-1.7c-1,0-2.3,0.5-2.3,1.3c0,0.7,1,1,3,1.5c2.3,0.6,5.5,1.4,5.5,4.6
							c0,2.8-2.4,4.5-5.8,4.5c-4.5,0-6.4-3.1-6.4-5.3h3.5c0,0,0.3,2.3,3.2,2.3c1.6,0,2.1-0.7,2.1-1.3c0-0.9-1.2-1.2-2.6-1.6
							c-2.2-0.5-6-1.3-6-4.5C98,2,100.6,0,103.9,0C107.7,0,109.7,2.6,109.7,4.8z"/>
						<path class="st0" d="M125.9,4.8h-3.5c0-0.7-0.9-1.7-2.3-1.7c-1,0-2.3,0.5-2.3,1.3c0,0.7,1,1,3,1.5c2.3,0.6,5.5,1.4,5.5,4.6
							c0,2.8-2.4,4.5-5.8,4.5c-4.5,0-6.4-3.1-6.4-5.3h3.5c0,0,0.3,2.3,3.2,2.3c1.6,0,2.1-0.7,2.1-1.3c0-0.9-1.2-1.2-2.6-1.6
							c-2.2-0.5-6-1.3-6-4.5c0-2.6,2.6-4.6,5.9-4.6C123.9,0,125.9,2.6,125.9,4.8z"/>
						<path class="st0" d="M141.6,0.3v3.2H134V6h6.3v3H134v2.5h7.6v3.2h-11.1V0.3H141.6z"/>
					</svg>
					</div>
				</a>
				@yield('lateral')
			</nav>
		</aside>
		<main>
			<header>
				<nav class="menu-principal">
					<ul>
						<a href="{{ url('/crm') }}">
							<li class="active">CRM</li>
						</a>
						<a href="{{ url('/loja') }}">
							<li>LOJA</li>
						</a>
						<a href="{{ url('/estrutura') }}">
							<li>ESTRUTURA DA PÁGINA</li>
						</a>
						<a href="{{ url('/supporte') }}">
							<li>SUPPORTE</li>
						</a>
					</ul>
				</nav>
				<nav class="login-box">
					@if (Auth::guest())
						<a href="{{ url('/login') }}">
							<span class="login-content">Login</span>
						</a>
					@else
					<span class="login-content">
						{{ Auth::user()->name }} <span class="arrow-down"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 3.6"><defs></defs><polygon class="pol" points="6.5 0 3.25 3.6 0 0 6.5 0"/></svg></span>
						<div class="submenu">
							<ul>
								<a href="#">
									<li>A minha conta</li>
								</a>
								<a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									<li>Logout</li>
								</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</ul>
						</div>
					</span>
					@endif
				</nav>
				<nav class="second-menu-stats">
					<ul>
						<li>
							<div class="box">
								<span class="type">visitas</span>
								<span class="number">134</span>
							</div>
						</li>
						<li>
							<div class="box">
								<span class="type">ped. de contacto</span>
								<span class="number">26</span>
							</div>
						</li>
						<li>
							<div class="box">
								<span class="type">conversão</span>
								<span class="number">20%</span>
							</div>
						</li>
						<li>
							<div class="box online">
								<span class="type">online agora</span>
								<span class="number">14</span>
							</div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</nav>
				<div class="clearfix"></div>
			</header>
			<section>
				@yield('content')
			</section>
			<div class="clearfix"></div>
		</main>
	</div>
</body>
<body>