$(window).load(function() {
    $("#preloader-wrapper").fadeOut("slow");
});

$(document).ready(function(){


     
    //animated header class
    $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
     //console.log(scroll);
    if (scroll > 200) {
        //console.log('a');
        $(".navigation").addClass("animated");
    } else {
        //console.log('a');
        $(".navigation").removeClass("animated");
    }});



    $(".gallery-slider").owlCarousel(
        {
        pagination : true,
        autoPlay : 5000,
        itemsDesktop  :  [1500,4],
        itemsDesktopSmall :  [979,3]
        }
    );

    // Gallery Popup
    $('.image-popup').magnificPopup({type:'image'});
	
	
	$('#contact_form').submit(function(e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success: function(data) {
				createMessage('A sua mensagem foi enviada com sucesso', 200);
			},
			error: function(){
				createMessage('Orocceu um erro desconhecido', 500);
			}
		});
	});



});

var createMessage = function(message, type) {
	if(type == 200)
		$('#contact_form').before('<div class="alert alert-success">' + message + '</div>');
	if(type == 500)
		$('#contact_form').before('<div class="alert alert-danger">' + message + '</div>');
	setTimeout(function(){
		$('.alert').remove();
	},3000);
}







