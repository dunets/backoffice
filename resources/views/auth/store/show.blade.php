@extends('layouts.app')

@section('store_active')
active
@endsection

@section('products_active')
active
@endsection

@section('lateral')
	@include('auth.lateral.storeOrders')
@endsection

@section('content')

	@if(count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	@if (\Session::has('success'))
		<div class="alert alert-success">
			<p>{!! \Session::get('success') !!}</p>
		</div>
	@endif

	<h1>Editar produto</h1>
	{!! Form::open(['url' => 'store/' . $product['id'], 'method' => 'put']) !!}

		<div class="form-group">
			<label for="name">Nome do produto</label>
			<input class="form-control" type="text" name="name" placeholder="Nome do produto" value="{{ $product['name'] }}">
		</div>
		<div class="form-group">
			<label for="description">Descrição</label>
			<textarea id="description" name="description" class="form-control big-text-editor" rows="6">{!! $product['description'] !!}</textarea>
		</div>
		<div class="form-group">
			<label for="short_description">Curta Descrição</label>
			<textarea id="short-description" name="short_description" class="form-control short-text-editor" rows="3">{!! $product['short_description'] !!}</textarea>
		</div>
		<hr>
		<h2>Definições do produto</h2>
		<div class="row">
			<div class="container-fluid">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#price" data-toggle="tab">Gerais</a></li>
					<li><a href="#inventary" data-toggle="tab">Inventário</a></li>
					<li><a href="#shipping" data-toggle="tab">Expedição</a></li>
				</ul>
				<div class="tab-content">
					
					<div class="tab-pane active" id="price">
						<div class="col-lg-6">
							
							<div class="form-group">
								<label for="regular_price">Preço regular</label>
								<div class="input-group">
									<div class="input-group-addon">€</div>
									<input type="text" class="form-control"name="regular_price" value="{{ $product['regular_price'] }}">
								</div>
							</div>
							<div class="form-group">
								<label for="sale_price">Preço com desconto</label>
								<div class="input-group">
									<div class="input-group-addon">€</div>
									<input type="text" class="form-control" name="sale_price" value="{{ $product['sale_price'] }}">
								</div>
							</div>
							
							<hr>
							
							<h4>Cronograma <small class="action schedule">@if(empty($product['date_on_sale_from'])) ligar @else desligar @endif</small></h4>
							
							<div class="schedule-box @if(empty($product['date_on_sale_from']))hidden @endif">
							
								<div class="form-group">
									<label for="date_on_sale_from">De</label>
									<div class="input-group">
										<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
										<input type="text" class="form-control datepicker" id="date_on_sale_from" name="date_on_sale_from" value="{{ $product['date_on_sale_from'] }}">
									</div>
								</div>
								<div class="form-group">
									<label for="date_on_sale_to">Até</label>
									<div class="input-group">
										<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
										<input type="text" class="form-control datepicker" id="date_on_sale_to" name="date_on_sale_to" value="{{ $product['date_on_sale_to'] }}">
									</div>
								</div>
								
								<hr>
								
							</div>
							
							<div class="form-group">
								<label for="tax_status">Estado fiscal</label>
								{!! Form::select('tax_status', ['taxable' => 'Tributável', 'shipping' => 'Somente envio', 'none' => 'Sem estado'], $product['tax_status'], ['class' => 'form-control']) !!}
							</div>
							<div class="form-group">
								<label for="tax_class">Classe fiscal</label>
								{!! Form::select('tax_class', ['standard' => 'Padrão', 'reduced-rate' => 'Taxa reduzida', 'zero-rate' => 'Taxa zero'], $product['tax_class'], ['class' => 'form-control']) !!}
							</div>
							
							
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="tab-pane" id="inventary">
						<div class="col-lg-6">
							
							<div class="form-group">
								<label for="sku">SKU</label>
								<input type="text" class="form-control" id="sku" name="sku" value="{{ $product['sku'] ? $product['sku'] : '' }}">
							</div>
							<div class="form-group">
								<label for="manage_stock">Gerir estoque?</label>
								<input type="hidden" name="manage_stock" value="false">
								&nbsp; {!! Form::checkbox('manage_stock', $product['manage_stock'] ? 'true' : null, $product['manage_stock'], ['class' => 'action sku', 'data-toggle' => 'toggle']) !!}
							</div>
							<div class="sku-box @if(!$product['manage_stock'])hidden @endif">
								<div class="form-group">
									<label for="stock_quantity">Quantidade</label>
									<input type="text" class="form-control" name="stock_quantity" value="{{ $product['stock_quantity'] ? $product['stock_quantity'] : '0' }}">
								</div>
								<div class="form-group">
									<label for="backorders">Permitir devoluções</label>
									{!! Form::select('backorders', ['no' => 'Não permitir', 'notify' => 'Permitir, mas notificar o cliente', 'yes' => 'Permitir'], $product['backorders'], ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group">
								<label for="in_stock">Estado do estoque</label>
								{!! Form::select('in_stock', [false => 'Fora de estoque', true => 'Em estoque'], $product['in_stock'], ['class' => 'form-control']) !!}
							</div>
							
							<hr>
							
							<div class="form-group">
								<label for="sold_individually">Vender individualmente</label>
								<input type="hidden" name="sold_individually" value="false">
								&nbsp; {!! Form::checkbox('sold_individually',  $product['sold_individually'] ? 'true' : 'false', $product['sold_individually'], ['data-toggle' => 'toggle']) !!}
								Ative esta opção para permitir que apenas um item seja comprado por cada compra
							</div>
							
						</div>
						<div class="clearfix"></div>
					</div>
					
					<div class="tab-pane" id="shipping">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="weight">Peso (kg)</label>
								<input type="text" class="form-control" name="weight" value="{{ $product['weight'] }}">
							</div>
							<h4>Dimensões (cm)</h4>
							<div class="form-group">
								<label for="length">Comprimento</label>
								<input type="text" class="form-control" name="length" value="{{ $product['dimensions']['length'] }}">
							</div>
							<div class="form-group">
								<label for="width">Largura</label>
								<input type="text" class="form-control" name="width" value="{{ $product['dimensions']['width'] }}">
							</div>
							<div class="form-group">
								<label for="height">Altura</label>
								<input type="text" class="form-control" name="height" value="{{ $product['dimensions']['height'] }}">
							</div>
							
						</div>
						<div class="clearfix"></div>
					</div>
					
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="container-fluid">
				<div class="form-group">
					<label for="status">Estado do produto </label>
					{!! Form::select('status', ['publish' => 'Publicado', 'pending' => 'Pendente de revisão', 'draft' => 'Rascunho'], $product['status'] , ['class' => 'form-control']); !!}
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Guardar as alterações</button>
				</div>
				<span class="action delete-edit">Eliminar o produto</span>
			</div>
		</div>
	{!! Form::close() !!}
	<div class="hidden">
		{!! Form::open(['method' => 'delete', 'id' => 'delete_form']) !!}
			<input type="text" name="id">
		{!! Form::close() !!}
	</div>
@endsection