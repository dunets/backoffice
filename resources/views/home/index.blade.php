<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $data['seo_title'] }}</title>
		<meta name="keywords" content="{{ $data['seo_keywords'] }}">
        <meta name="description" content="{{ $data['seo_desc'] }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta property=”og:title” content=”{{ $data['seo_og_title'] }}”/>
		<meta property=”og:image” content=”{{ $data['seo_og_url'] }}”/>
		<meta property=”og:description” content=”{{ $data['seo_og_desc'] }}”/>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <!-- Fonts -->
        <!-- Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400i|Source+Sans+Pro:300,400,600,700" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
        
        <!-- CSS -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
        

        <link rel="stylesheet" href="/css/home/themefisher-fonts.css">
        <link rel="stylesheet" href="/css/home/owl.carousel.css">
        <link rel="stylesheet" href="/css/home/magnific-popup.css">
        <link rel="stylesheet" href="/css/home/style.css">
        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href="/css/home/responsive.css">
    </head>

    <body id="body">

    	<div id="preloader-wrapper">
    		<div class="pre-loader">
				<img src="/images/D-icon.png" alt="divanesse load icon">
			</div>
    	</div>

	    <!-- 
	    Header start
	    ==================== -->
        <div class="container">
            <nav class="navbar navigation " id="top-nav">
                <a class="navbar-brand logo" href="#">
        			<img alt="Brand" src="/images/logo.png">
      			</a>

              <button class="navbar-toggler hidden-lg-up float-lg-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
                  <i class="tf-ion-android-menu"></i>
              </button>
              <div class="collapse navbar-toggleable-md" id="navbarResponsive">
                <ul class="nav navbar-nav menu float-lg-right" id="top-nav">
                  <li class="">
                    <a href="/loja">LOJA</a>
                  </li>
                  <li class="">
                    <a href="#contact">CONTACTO</a>
                  </li>
                </ul>
              </div>
            </nav>
        </div>
        

	    <section class="hero-area">
	        <div class="container">
	            <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="{!! $data['img_destaque'] !!}" alt="Imagem destaque" class="destaque_img">
                    </div>
	                <div class="col-md-6">
	                    <div class="block">
	                        <h1 class="">{{ $data['titulo_destaque'] }}</h1>
	                        <p>{{ $data['desc_destaque'] }}</p>
	                        <a class="btn btn-main" href="{!! $data['url_destaque'] !!}" role="button">Ver na loja - {{ $data['price_destaque'] }} €</a>
	                    </div>
	                </div>
	            </div><!-- .row close -->
	        </div><!-- .container close -->
	    </section><!-- header close -->


        <!-- 
        Feature start
        ==================== -->
        <section class="feature section">
            <div class="container">
                <div class="row">
                    <div class="heading">
                        <h2>Algumas características</h2>
                    </div>
                    <div class="col-md-4">
						@if(!empty($data['features_title_1']))
							<div class="feature-box">
								<h4>{{ $data['features_title_1'] }}</h4>
								<p>{{ $data['features_desc_1'] }}</p>
							</div>
						@endif
                        @if(!empty($data['features_title_2']))
							<div class="feature-box">
								<h4>{{ $data['features_title_2'] }}</h4>
								<p>{{ $data['features_desc_2'] }}</p>
							</div>
						@endif
						@if(!empty($data['features_title_3']))
							<div class="feature-box">
								<h4>{{ $data['features_title_3'] }}</h4>
								<p>{{ $data['features_desc_3'] }}</p>
							</div>
						@endif
                    </div>
                    <div class="col-md-4 text-center">
                        <img style="max-height:420px" src="{!! $data['img_destaque_down'] !!}" alt="Destaque baixo">
                    </div>
                    <div class="col-md-4">
                       @if(!empty($data['features_title_4']))
							<div class="feature-box">
								<h4>{{ $data['features_title_4'] }}</h4>
								<p>{{ $data['features_desc_4'] }}</p>
							</div>
						@endif
                        @if(!empty($data['features_title_5']))
							<div class="feature-box">
								<h4>{{ $data['features_title_5'] }}</h4>
								<p>{{ $data['features_desc_5'] }}</p>
							</div>
						@endif
                        @if(!empty($data['features_title_6']))
							<div class="feature-box">
								<h4>{{ $data['features_title_6'] }}</h4>
								<p>{{ $data['features_desc_6'] }}</p>
							</div>
						@endif
                    </div>
                </div>
            </div><!-- .container close -->
        </section><!-- #service close -->

        <section class="promo-details section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img style="max-height:400px" src="{!! $data['img_destaque_line'] !!}" alt="Imagem da linha">
                    </div>
                    <div class="col-md-6">
                        <div class="content mt-100">
                            <h2 class="subheading">{{ $data['title_destaque_line'] }}</h2>
                            <p>{{ $data['desc_destaque_line'] }}</p>
							<a class="btn btn-main" href="{!! $data['url_destaque_line'] !!}" role="button">Ver na loja</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		@if(!empty($sales))
			<section class="gallery">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>últimos descontos</h2>
							</div>
							<div class="gallery-slider">
							@foreach($sales as $sale)
								<div class="block">
									<div class="gallery-overlay">
										<a  href="{!! $sale['url'] !!}" class="image-popup gallery-popup">
											<i class="tf-ion-ios-search"></i>
										</a>
									</div>

									<img class="img-fluid" src="{!! $sale['img'] !!}" alt="Imagem de saldo id {{ $sale['id_produto'] }}">
									<div class="gallery-price">
										{!! $sale['price'] !!}
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
		@endif
        
        <section class="call-to-action section bg-opacity bg-1">
			<a name="contact"></a>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow text-center">
                        <div class="block">
                            <h2 class="subheading">Contacto</h2>
							<div class="contact-text">
								{!! $data['contact_text'] !!}
							</div>
                            <div class="col-lg-6 offset-lg-3">
								<form id="contact_form" action="/" method="post">
									{{ csrf_field() }}
									<div class="form-group">
									  <input type="text" name="name" class="form-control" placeholder="O seu nome aqui">
									</div>
									<div class="form-group">
									  <input type="text" name="email" class="form-control" placeholder="O seu endereço de email aqui">
									</div>
									<div class="form-group">
										<textarea rows="4" name="mensagem" class="form-control" placeholder="A sua mensagem aqui"></textarea>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-main">Enviar</button>
									</div>
								</form>
                              </div><!-- /.col-lg-6 -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #call-to-action close -->



        <footer>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <a href="#" class="footer-logo">
								<img alt="Brand" src="/images/logo.png">
							</a>
                            <p class="copyright-text">Copyright &copy; <a href="http://www.Themefisher.com">Themefisher</a>| All right reserved.</p>
                        </div>
                    </div>
					<a href="/login">Área de utilizares</a>
                </div>
            </div>
        </footer>


        <!-- Js -->
        <script src="/js/home/vendor/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
        <script src="/js/home/vendor/modernizr-2.6.2.min.js"></script>
        <script src="/js/home/owl.carousel.min.js"></script>
        <script src="/js/home/jquery.magnific-popup.min.js"></script>
        <script src="/js/home/main.js"></script>
        
    </body>
</html>
