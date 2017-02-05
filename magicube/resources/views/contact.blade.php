@extends('layouts.layout')

@section('title')
{{trans('messages.contact-title')}}
@endsection

@section('contact-active')
active
@endsection

@section('content')

<div class="text-container">
	<h2>{{trans('messages.contact-h2-sobre')}}</h2>
	<p>
		{!!trans('messages.contact-p-sobre')!!}
	</p>
	<h2>{{trans('messages.contact-h2-contacto')}}</h2>
	<p>
		{!!trans('messages.contact-p-contacto')!!}
	</p>
	<h2>{{trans('messages.contact-h2-local')}}</h2>
	<p>
		{!!trans('messages.contact-p-local')!!}
	</p>
</div>
<div id='gmap_canvas' class="map-container">
	<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyB_GFsd_Ksd8tkZ78UAksd2t6iihRxoOio&v=3.exp&callback=initMap'></script>
	<script type='text/javascript'>function init_map(){var myOptions = {zoom:11,center:new google.maps.LatLng(39.9453289,-8.689936999999986),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(39.9453289,-8.689936999999986)});infowindow = new google.maps.InfoWindow(
			{content:
			 '<div style="text-align:center"><img style="width:100px; margin:20px 0" src="/img/itens/logo.jpg" alt="logo"><br>Rua Primeiro de Maio n-36, <br> Reguengo, 3105-452 Pombal<br></div>'
			});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
</div>

@endsection