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
	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/simple-sidebar.css" rel="stylesheet">

	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
	</script>
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
						<a class="navbar-brand" href="{{ url('/home') }}">
							{{ config('app.name', 'Divanesse') }}
						</a>
					</div>

					<div class="collapse navbar-collapse" id="app-navbar-collapse">
						<!-- Left Side Of Navbar -->
						@if (!Auth::guest())
							<ul class="nav navbar-nav">
								<li class="active"><a href="{{ url('/crm') }}">CRM <span class="sr-only">(current)</span></a></li>
								<li><a href="{{ url('/store') }}">Loja</a></li>
								<li><a href="{{ url('/structure') }}">Estrutura da página</a></li>
								<li><a href="{{ url('/support') }}">Supporte</a></li>
							</ul>
						@endif
										<!-- Right Side Of Navbar -->
						<ul class="nav navbar-nav navbar-right">
							<!-- Authentication Links -->
							@if (Auth::guest())
									<li><a href="{{ url('/login') }}">Login</a></li>
									<li><a href="{{ url('/register') }}">Register</a></li>
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
												Logout
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
	<script src="/js/app.js"></script>
</body>
</html>
