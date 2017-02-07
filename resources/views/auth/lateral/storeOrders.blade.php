<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li class="@yield('products_active')">
			<a href="{{ url('/store') }}">Produtos</a>
		</li>
		<li class="@yield('orders_active')">
			<a href="{{ url('/orders') }}">Encomendas</a>
		</li>
	</ul>
</div>