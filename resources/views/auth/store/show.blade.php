@extends('layouts.app')

@section('lateral')
	@include('auth.store.lateral')
@endsection

@section('content')
	<h1>Editar produto</h1>
	{!! Form::open(['url' => 'foo/bar']) !!}

		<div class="form-group">
			<label for="name">Nome do produto</label>
			<input class="form-control" type="text" name="name" placeholder="Nome do produto" value="{{ $produto['name'] }}">
		</div>
		<div class="form-group">
			<label for="permalink">Link permanente</label>
			<div class="input-group">
				<div class="input-group-addon">http://wordpress.dev/product/</div>
				<input type="text" class="form-control" placeholder="Link permanente" name="permalink" value="{{ $produto['slug'] }}">
			</div>
		</div>
		<hr>
		<div class="form-group">
			<label for="description">Descrição</label>
			<textarea id="description" name="description" class="form-control" rows="6">{!! $produto['description'] !!}</textarea>
		</div>
		<div class="form-group">
			<label for="short-description">Curta Descrição</label>
			<textarea id="short-description" name="short_description" class="form-control" rows="3">{!! $produto['short_description'] !!}</textarea>
		</div>
		<hr>
		<h2>Definições do produto</h2>
		<div class="row">
			<div class="container-fluid">
				<ul class="nav nav-tabs">
					<li><a href="#hello" data-toggle="tab">Gerais</a></li>
					<li><a href="#inventary" data-toggle="tab">Inventário</a></li>
					<li class="active"><a href="#shipping" data-toggle="tab">Expedição</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane" id="hello">
						<div class="col-lg-6">
							
							<div class="form-group">
								<label for="regular_price">Preço regular</label>
								<div class="input-group">
									<div class="input-group-addon">€</div>
									<input type="text" class="form-control"name="regular_price" value="{{ $produto['regular_price'] }}">
								</div>
							</div>
							<div class="form-group">
								<label for="sale_price">Preço com desconto</label>
								<div class="input-group">
									<div class="input-group-addon">€</div>
									<input type="text" class="form-control" name="sale_price" value="{{ $produto['sale_price'] }}">
								</div>
							</div>
							
							<hr>
							
							<h4>Cronograma <small class="schedule">ligado</small></h4>
							
							<div class="schedule-box">
							
								<div class="form-group">
									<label for="regular_price">De</label>
									<div class="input-group">
										<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
										<input type="text" class="form-control datepicker"name="regular_price" value="{{ $produto['date_on_sale_from'] }}">
									</div>
								</div>
								<div class="form-group">
									<label for="regular_price">Até</label>
									<div class="input-group">
										<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
										<input type="text" class="form-control datepicker"name="regular_price" value="{{ $produto['date_on_sale_to'] }}">
									</div>
								</div>
								
								<hr>
								
							</div>
							
							<div class="form-group">
								<label for="sale_price">Estado fiscal</label>
								{!! Form::select('tax_status', ['taxable' => 'Tributável', 'shipping' => 'Somente envio', 'none' => 'Sem estado'], $produto['tax_status'], ['class' => 'form-control']) !!}
							</div>
							<div class="form-group">
								<label for="sale_price">Classe fiscal</label>
								{!! Form::select('tax_class', ['standard' => 'Padrão', 'reduced-rate' => 'Taxa reduzida', 'zero-rate' => 'Taxa zero'], $produto['tax_class'], ['class' => 'form-control']) !!}
							</div>
							
							
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="tab-pane" id="inventary">
						<div class="col-lg-6">
							
							<div class="form-group">
								<label for="sku">SKU</label>
								<input type="text" class="form-control" name="sku" value="{{ $produto['sku'] }}">
							</div>
							<div class="form-group">
								<label for="sku">Gerir estoque?</label>
								{!! Form::checkbox('manage_stock', $produto['manage_stock'], $produto['manage_stock']) !!}
							</div>
							<div class="sku-box">
								<div class="form-group">
									<label for="stock_quantity">Quantidade</label>
									<input type="text" class="form-control" name="stock_quantity" value="{{ $produto['stock_quantity'] }}">
								</div>
								<div class="form-group">
									<label for="backorders">Permitir devoluções</label>
									{!! Form::select('backorders', ['no' => 'Não permitir', 'notify' => 'Permitir, mas notificar o cliente', 'yes' => 'Permitir'], $produto['backorders'], ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group">
								<label for="in_stock">Estado do estoque</label>
								{!! Form::select('in_stock', [false => 'Fora de estoque', true => 'Em estoque'], $produto['in_stock'], ['class' => 'form-control']) !!}
							</div>
							
							<hr>
							
							<div class="form-group">
								<label for="sold_individually">Vender individualmente</label>
								{!! Form::checkbox('sold_individually', $produto['sold_individually'], $produto['sold_individually']) !!}
								Ative esta opção para permitir que apenas um item seja comprado por cada compra
							</div>
							
						</div>
						<div class="clearfix"></div>
					</div>
					
					<div class="tab-pane active" id="shipping">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="weight">Peso (kg)</label>
								<input type="text" class="form-control" name="weight" value="{{ $produto['weight'] }}">
							</div>
							<h4>Dimensões (cm)</h4>
							<div class="form-group">
								<label for="length">Comprimento</label>
								<input type="text" class="form-control" name="length" value="{{ $produto['dimensions']['length'] }}">
							</div>
							<div class="form-group">
								<label for="width">Largura</label>
								<input type="text" class="form-control" name="width" value="{{ $produto['dimensions']['width'] }}">
							</div>
							<div class="form-group">
								<label for="height">Altura</label>
								<input type="text" class="form-control" name="height" value="{{ $produto['dimensions']['height'] }}">
							</div>
							
							<hr>
							
							<div class="form-group">
								<label for="shipping_class">Tipo de expedição</label>
								{!! Form::select('shipping_class', ["" => 'Sem tipo'], $produto['shipping_class'], ['class' => 'form-control']) !!}
							</div>
							
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
@endsection