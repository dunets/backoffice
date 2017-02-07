@extends('layouts.app')

@section('prom_active')
active
@endsection

@section('landing_active')
active
@endsection

@section('lateral')
	@include('auth.lateral.landing')
@endsection

@section('content')
	<h1>Selecionar os produtos a apresentar</h1>
	<p>Caregoria: <code>saldos</code></p>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>IMG</th>
				<th>Nome</th>
				<th>Stock</th>
				<th>Preço</th>
				<th>Tipo</th>
				<th>Ações</th>
			</tr>
		</thead>
		@if(!empty($data))
			@foreach($data as $product)
				<tr>
					<td>
						{{$product['id']}}
					</td>
					<td>
						<img class="img-responsive table-store-img" src="{{$product['images'][0]['src']}}" alt="{{$product['images'][0]['alt']}}" />
					</td>
					<td>{{ $product['name']}}</td>
					<td>
						@if($product['in_stock'])
							em stock
						@else
							esgotado
						@endif
					</td>
					<td>
						@if($product['on_sale'])
							<del>{{$product['regular_price']}} €</del>
							<strong>{{$product['sale_price']}} €</strong>
						@else
							<span>{{$product['regular_price']}} €</span>
						@endif
					</td>
					<td>
						@if($product['status'] == 'publish')
							Publicado em: <br>
							{{ date('d/m, Y', strtotime($product['date_modified'])) }}
						@elseif ($product['status'] == 'pending')
							Pendente
						@else
							-
						@endif
					</td>
					<td>
						<input class="switch-prom" type="checkbox" _url="{{ url('/landing_prom') }}" _product_id="{{ $product['id'] }}"
							@foreach ($sales as $sale)
								@if ($sale['product_id'] == $product['id'])
									 checked
								@endif
							@endforeach
						 data-toggle="toggle">
					</td>
				</tr>
			@endforeach
		@endif
	</table>

	@if ($pages > 1)
		<nav aria-label="Page navigation">
			<ul class="pagination" style="float:right">
				<li class="@if($page == 1)disabled @endif">
					<a href="@if($page > 1) {{ url('/store?page=' . ($page - 1)) }} @endif" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				@for ($i = 1; $i < ($pages+1) && $i < 11; $i++)
					@if($i == 10)
						<li class="disabled"><a>...</a></li>
					@else
						<li class="@if($page == $i)active @endif"><a href="{{ url('/store?page=' . $i) }}">{{ $i }}</a></li>
					@endif
				@endfor
				<li class="@if($page == $pages)disabled @endif">
					<a href="@if($page < $pages) {{ url('/store?page=' . ($page + 1)) }} @endif" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
	@endif


	<div class="hidden">
		{!! Form::open(['method' => 'delete', 'id' => 'delete_form']) !!}
			<input type="text" name="id">
		{!! Form::close() !!}
	</div>
@endsection