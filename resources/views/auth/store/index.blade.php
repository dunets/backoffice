@extends('layouts.app')

@section('lateral')
	@include('auth.store.lateral')
@endsection

@section('content')

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
					<!--<td>
						<input type="checkbox" name="table-field-{{$product['id']}}">
					</td>-->
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
						@foreach($product['categories'] as $category)
							{{$category['name']}}@if ($category != end($product['categories'])), @endif
						@endforeach
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
								<a href="{{ url('store/show-product')}}/{{$product['id']}}" class="btn btn-primary" type="button">Editar</a>
							<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"><span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Ver na loja</a></li>
								<li><a href="#">Duplicar</a></li>
								<li class="divider"></li>
								<li><a href="#">Apagar</a></li>
							</ul>
						</div>
					</td>
				</tr>
			@endforeach
		@endif
	</table>

	<h3>Erros:</h3>
	<code>
		{{ var_dump($errors) }}
	</code>
@endsection