var imagens = {
	t0 : {
		text : "T0",
		link : "/img/planos/t0.jpg"
	},
	t1 : {
		text : "T1",
		link : "/img/planos/t1.jpg"
	},
	t2 : {
		text : "T2",
		link : "/img/planos/t2.jpg"
	},
	t3 : {
		text : "T3",
		link : "/img/planos/t3.jpg"
	}
}

$(window).on('load', function(){
	
	setTimeout(function(){
		
		$('.alert, .loader').remove();
		
	},2000);
	
	var col = 3;
	if($(window).width() < 800) {
		col = 2
	}

	$('#works-container').BlocksIt({
		numOfCol: col,
		offsetX: 8,
		offsetY: 8,
		blockElement: '.block'
	});
	
	var wow = new WOW({
		offset: -200,
		mobile:       false
	});
	wow.init();
	
	$('body').removeClass('loading');
});

$(document).ready(function(){
	
	prepareForms();
	
	$('body.loading .loader')
		.css(
			'top', ($(window).height() - $('body.loading .loader').height()) / 2 + 'px'
		).css(
			'left', ($(window).width() - $('body.loading .loader').width()) / 2 + 'px'
		)
	
	if (!device.tablet() && !device.mobile() && $(window).width() > 800) {
		
		prepare();
		$(window).resize(function(){
			if (!device.tablet() && !device.mobile() && $(window).width() > 800)
				prepare()
			else
				prepareMobile();
		});

		//EVENTS
			//navbar
		$('.nav-bar-mobile .button').click(function(){
			$('.nav-bar').toggleClass('active');
		});
			//slide
		$('.view-image-btn').click(function(){
			slideOpen($(this));
		});
		$('.slide-container .close-button').click(function(){
			$('.slide-container').removeClass('active');
			$('.slide-btn').removeClass('off');
		});
		$('.slide-container .slide-btn.right').click(slideNext);
		$('.slide-container .slide-btn.left').click(slidePrev);
		
	} else {
		prepareMobile();
		$(window).resize(function(){
			if (!device.tablet() && !device.mobile() && $(window).width() > 800)
				prepare()
			else
				prepareMobile();
		});
		
		//EVENTS
			//navbar
		$('.nav-bar-mobile .button').click(function(){
			$('.nav-bar').toggleClass('active');
		});
		$('.view-image-btn').click(function(){
			slideOpen($(this));
		});
			//slide
		$('.slide-container .close-button').click(function(){
			$('.slide-container').removeClass('active');
			$('.slide-btn').removeClass('off');
		});
		$('.slide-container .slide-btn.right').click(slideNext);
		$('.slide-container .slide-btn.left').click(slidePrev);
		
	}
});

var prepareMobile = function(){
	
	$('footer').height(
		$(window).height() * .075
	)
	
	
	//página inicial
	$('.big-image').height(
		$(window).height() - $('.nav-bar').height() - ($('.nav-bar').height() / 2)
	);
	
	//works
	$('.small-image').height(
		$(window).height() * .6
	);
	$('.small-image .white-box').css(
		'line-height', $(window).height() * .6 + 'px'
	);
	$('.large-image .white-box').height(
		$('.large-image img').height() + 'px'
	).css(
		'line-height',
		$('.large-image img').height() + 'px'
	);
	
	//about
	$('.map-container').height(
		$(window).width() * .9
	);
	

	//calc bug
	$('.form-container .input-box input, .form-container .input-box textarea').css(
		'width', ($('.form-container .input-box').width() - 32) + 'px'
	);
	
	//translate bug
	$('.slide-container .image-container')
		.css(
			'top',
			(($(window).height() - $('.slide-container .image-container').height()) / 2) + 30 + 'px'
		).css(
			'left', (($(window).width() - $('.slide-container .image-container').width()) / 2) + 'px'
		);
	
	
	var col = 3;
	if($(window).width() < 800) {
		col = 2
	}
		
	$('#works-container').BlocksIt({
		numOfCol: col,
		offsetX: 8,
		offsetY: 8,
		blockElement: '.block'
	});
}

var prepare = function() {
	
	$('footer').height(
		$(window).height() * .05
	)
	
	
	//página inicial
	if($('.nav-bar').height() != $(window).height() * .151) {
		$('.nav-bar, .nav-bar ul, .nav-bar ul li').height($(window).height() * .151);
		// to add text add here ', .nav-bar .home-btn
		$('.nav-bar ul li').css('line-height', $(window).height() * .151 + 'px');
		$('.nav-bar .home-btn').height($(window).height() * .151);
	}
	
	if(
		$('main').height() != ($(window).height() - $('.nav-bar').height() - $('footer').height())
	)
		$('main').css(
			'min-height',
			$(window).height() - $('.nav-bar').height() - $('footer').height() - 5 + 'px'
		);
	
	
	$('.big-image').height(
		$(window).height() - $('.nav-bar').height() - ($('.nav-bar').height() / 2)
	);
	
	//encomendas / orçamentos
	if($('.radio-custom').eq(0).width() > 235) {
		$('.radio-custom, .radio-image').height($('.radio-custom').eq(0).width() * .64);
		$('.view-image-btn').width($('.radio-custom').eq(0).width() * .12);
		$('.view-image-btn').height($('.radio-custom').eq(0).width() * .12);
	}
	
	//obras
	$('.small-image').height(
		$(window).height() * .6
	);
	$('.small-image .white-box').css(
		'line-height', $(window).height() * .6 + 'px'
	);
	$('.large-image .white-box').height(
		$('.large-image img').height() + 'px'
	).css(
		'line-height',
		$('.large-image img').height() + 'px'
	);
	
	//about
	$('.map-container').height(
		$('.map-container').parent().find('.text-container').height()
	);
	

	//calc bug
	$('.form-container .input-box input, .form-container .input-box textarea').css(
		'width', ($('.form-container .input-box').width() - 32) + 'px'
	);
	
	//translate bug
	$('.slide-container .image-container')
		.css(
			'top',
			(($(window).height() - $('.slide-container .image-container').height()) / 2) + 30 + 'px'
		).css(
			'left', (($(window).width() - $('.slide-container .image-container').width()) / 2) + 'px'
		);
		
	$('#works-container').BlocksIt({
		numOfCol: 3,
		offsetX: 8,
		offsetY: 8,
		blockElement: '.block'
	});
	
}
var slideOpen = function(el) {
	$('.slide-container').addClass('active');
	$('.slide-container .close-button, .slide-text').height(
		$('.slide-container .close-button').width()
	);
	$('.slide-text').css(
		'line-height',
		$('.slide-container .close-button').width() + 'px'
	);

	slideOpenPhoto(
		el.parent().find('input[type="radio"]').val()
	);
	
}
var slideOpenPhoto = function(slide){
	$('.slide-container').find('img').attr('src', imagens[slide].link);
	$('.slide-container').find('.slide-text').text(imagens[slide].text);
	
	if(slide == Object.keys(imagens)[0]){
		$('.slide-btn.left').addClass('off');
		$('.slide-btn.right').removeClass('off');
	}else if(slide == Object.keys(imagens)[Object.keys(imagens).length - 1]){
		$('.slide-btn.right').addClass('off');
		$('.slide-btn.left').removeClass('off');
	}else {
		$('.slide-btn.off').removeClass('off')
	}
	
	$('.slide-container').attr('_index', slide);
	
	
	if (device.tablet() || device.mobile() || $(window).width() < 800) {
		$('.image-container img').css(
			'height',
			$('.image-container').height() + 'px'
		)
	}
	//translate bug
	$('.slide-container .image-container')
		.css(
			'top',
			(($(window).height() - $('.slide-container .image-container').height()) / 2) + 30 + 'px'
		).css(
			'left', (($(window).width() - $('.slide-container .image-container').width()) / 2) + 'px'
		);
	
}
var slideNext = function(){
	if(!$('.slide-container .slide-btn.right').hasClass('off')) {
		var slide = parseInt($('.slide-container').attr('_index').replace('t',''));
		
		//changing selected radio-button
		$('input[name=typ]:checked', 'form').prop('checked', false);
		$('.radio-custom-box')
			.find('.radio-custom').eq(++slide)
			.find('input[name=typ]').prop('checked', true);
		
		slide = 't' + slide;
		
		slideOpenPhoto(slide);
	}
}
var slidePrev = function(){
	if(!$('.slide-container .slide-btn.left').hasClass('off')) {
		var slide = parseInt($('.slide-container').attr('_index').replace('t',''));
		
		//changing selected radio-button
		$('input[name=typ]:checked', 'form').prop('checked', false);
		$('.radio-custom-box')
			.find('.radio-custom').eq(--slide)
			.find('input[name=typ]').prop('checked', true);
		
		slide = 't' + slide;
		
		slideOpenPhoto(slide);
	}
}

var prepareForms = function(){
	$('form').submit(function(e){
		e.preventDefault();
		
		
		if($('input[name="typ"]').length > 0 && $('input[name="typ"]:checked').length == 0 )
			errorMessage('radio')
		else
		
			$.ajax({
				url: $(this).attr('action'),
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				success: function(data) {
					$('.form-container form').before('<div class="alert success"><p>' + data.message + '</p></div>');
					setTimeout(function(){

						$('.alert').remove();

					},3000);
				},
				error: function(){
					errorMessage('global');
				}
			});
	});
}

var errorMessage = function(type){
	var locale = $('input[name="locale"]').val();
	
	if(type == 'radio') {
		var message = '';
		if(locale == 'en')
			message = 'Please select one plant!'
		else if (locale == 'fr')
			message = 'S\'il vous plaît sélectionner un plan!'
		else
			message = 'Por favor selecione uma planta!';
	} else {
		var message = '';
		if(locale == 'en')
			message = 'Please fill in all fields correctly!'
		else if (locale == 'fr')
			message = 'S\'il vous plaît remplir tous les champs correctement!'
		else
			message = 'Por favor preencha todos os campos corretamente!';
	}
		
	$('.form-container form').before('<div class="alert alert-danger"><p>' + message + '</p></div>');
	setTimeout(function(){

		$('.alert').remove();

	},3000);
}