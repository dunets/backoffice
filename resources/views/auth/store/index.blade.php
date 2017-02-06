@extends('layouts.app')

@section('lateral')
	@include('auth.store.lateral')
@endsection

@section('content')
	<h1>Produtos</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<!--<th>#</th>-->
				<th>ID</th>
				<th>IMG</th>
				<th>Nome</th>
				<th>Stock</th>
				<th>Preço</th>
				<th>Categorias</th>
				<th>Tags</th>
				<th>Tipo</th>
				<th>Data</th>
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
						@if(!empty($product['categories']))
							@foreach($product['categories'] as $category)
								{{$category['name']}}@if ($category != end($product['categories'])), @endif
							@endforeach
						@else
							-
						@endif
					</td>
					<td>
						@if(!empty($product['tags']))
							@foreach($product['tags'] as $tag)
								{{$tag['name']}}@if ($tag != end($product['tags'])), @endif
							@endforeach
						@else
							-
						@endif
					</td>
					<td>
						@if($product['virtual'])
							Virtual
						@else
							Simples
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
						<div class="btn-group btn-group-primary">
								<a href="{{ url('store')}}/{{$product['id']}}" class="btn btn-primary" type="button">Editar</a>
							<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"><span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="{{ $product['permalink'] }}" target="_blank">Ver na loja</a></li>
								<li class="divider"></li>
								<li><a href="{{ url('store')}}/{{$product['id']}}" class="action delete-list">Apagar</a></li>
							</ul>
						</div>
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