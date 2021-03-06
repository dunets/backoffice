<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="shortcut icon" href="/images/favicon.ico">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link href="/css/admin/app.css" rel="stylesheet">
	<link href="/css/admin/simple-sidebar.css" rel="stylesheet">
	<link href="/css/admin/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="/css/admin/sweetalert.css" rel="stylesheet">
	<link href="/css/admin/bootstrap-toggle.min.css" rel="stylesheet">
	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
	</script>
	<script src="/js/jquery.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">

				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- Branding Image -->
				<a class="navbar-brand" href="{{ url('/landing') }}">
					{{ config('app.name', 'Divanesse') }}
				</a>
			</div>

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				@if (!Auth::guest())
					<ul class="nav navbar-nav">
						<li class="@yield('store_active')"><a href="{{ url('/store') }}">Loja</a></li>
						<li class="@yield('landing_active')"><a href="{{ url('/landing') }}">Estrutura p. inicial</a></li>
						<li class="@yield('users_active')"><a href="{{ url('/users') }}">Utilizadores</a></li>

					</ul>
				@endif
								<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (Auth::guest())
							<li><a href="{{ url('/login') }}">Entrar</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('/logout') }}"
										onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
										Sair
									</a>

									<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	
	<div 
		@if ($__env->yieldContent('lateral'))
			 id="wrapper"
		@endif
	>
		
		@yield('lateral')
	
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div id="app">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	<!-- Scripts -->

	<script src="/js/admin/sweetalert.min.js"></script>
	<script src="/js/admin/moment.min.js"></script>
	<script src="/js/admin/bootstrap-datetimepicker.min.js"></script>
	<script src="/tinymce/tinymce.min.js"></script>
	<script src="/tinymce/jquery.tinymce.min.js"></script>
	<script>
		$('.datepicker').datetimepicker({
			format: 'YYYY-MM-DD'
		});
	</script>
	<script src="/js/admin/app.js"></script>
</body>
</html>
