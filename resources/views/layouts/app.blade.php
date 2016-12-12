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
	<script src="/tinymce/tinymce.min.js"></script>
	<script src="/tinymce/jquery.tinymce.min.js"></script>
	<script>tinymce.init({
			selector:'#description',
			menubar: false,
			min_height: 300,
			language: 'pt_PT',
			plugins: 'link image code',
			file_browser_callback_types: 'file image media',
			image_title: false,
			// enable automatic uploads of images represented by blob or data URIs
			// URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
			//images_upload_url: 'postAcceptor.php',
			// here we add custom filepicker only to Image dialog
			file_picker_types: 'image',
			// and here's our custom image picker
			file_picker_callback: function(cb, value, meta) {
				var input = document.createElement('input');
				input.setAttribute('type', 'file');
				input.setAttribute('accept', 'image/*');

				// Note: In modern browsers input[type="file"] is functional without 
				// even adding it to the DOM, but that might not be the case in some older
				// or quirky browsers like IE, so you might want to add it to the DOM
				// just in case, and visually hide it. And do not forget do remove it
				// once you do not need it anymore.

				input.onchange = function() {
					var file = this.files[0];

					// Note: Now we need to register the blob in TinyMCEs image blob
					// registry. In the next release this part hopefully won't be
					// necessary, as we are looking to handle it internally.
					var id = 'blobid' + (new Date()).getTime();
					var blobCache = tinymce.activeEditor.editorUpload.blobCache;
					var blobInfo = blobCache.create(id, file);
					blobCache.add(blobInfo);

					// call the callback and populate the Title field with the file name
					cb(blobInfo.blobUri(), { title: file.name });
				};

				input.click();
			},
			images_upload_url: '/wordpress/upload',
			automatic_uploads: true
			
		});
	</script>
</body>
</html>
