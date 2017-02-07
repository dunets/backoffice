<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li class="@yield('land_active')">
			<a href="{{ url('/landing') }}">Campos</a>
		</li>
		<li class="@yield('prom_active')">
			<a href="{{ url('/landing_prom') }}">Promoções</a>
		</li>
	</ul>
</div>