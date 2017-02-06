@extends('layouts.app')

@section('lateral')
	@include('auth.store.lateral')
@endsection

@section('content')

	@if(count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	<h1>Encomenda #{{ $order['number'] }} 
		<span class="label label-default">
			@if($order['status'] == 'completed')
				Concluída
			@elseif($order['status'] == 'pending')
				Recebida (pendente pagamento)
			@elseif($order['status'] == 'processing')
				Em processamento
			@elseif($order['status'] == 'on-hold')
				Aguarda confirmação de pagamento
			@elseif($order['status'] == 'cancelled')
				Cancelada
			@elseif($order['status'] == 'refunded')
				Reembolsada
			@elseif($order['status'] == 'failed')
				Falhada
			@endif
		</span>
</h1>
	<hr>
	<h4>Informações gerais da encomenda</h4>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Campo</th>
				<th>Informação</th>
			</tr>
		</thead>
		<tr>
			<td>ID Compra</td>
			<td>{{ $order['id'] }}</td>
		</tr>
		<tr>
			<td>Número compra</td>
			<td>{{ $order['number'] }}</td>
		</tr>
		<tr>
			<td>ID Comprador</td>
			<td>{{ $order['customer_id'] }}</td>
		</tr>
		<tr>
			<td>Método de Pagamento</td>
			<td>{{ $order['payment_method_title'] }}</td>
		</tr>
		<tr>
			<td>Última modificação da encomenda</td>
			<td>{{ date('d/m, Y - H:i', strtotime($order['date_modified'])) }}</td>
		</tr>
		<tr>
			<td>Criação da encomenda</td>
			<td>{{ date('d/m, Y - H:i', strtotime($order['date_created'])) }}</td>
		</tr>
		<tr>
			<td>Data do pagamento</td>
			<td>
				@if(!empty($order['date_paid']))
					{{ date('d/m, Y - H:i', strtotime($order['date_paid'])) }}
				@else
					-
				@endif
			</td>
		</tr>

	</table>
	<hr>
	<h4>Valores</h4>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Campo</th>
				<th>Informação</th>
			</tr>
		</thead>
		<tr>
			<td>Descontos</td>
			<td>{{ $order['discount_total'] }}€</td>
		</tr>
		<tr>
			<td>Custo de entrega</td>
			<td>{{ $order['shipping_total'] }}€</td>
		</tr>
		<tr>
			<td>Taxas aplicadas</td>
			<td>{{ $order['total_tax'] }}€</td>
		</tr>
		<tr>
			<td>Custo total</td>
			<td>{{ $order['total'] }}€</td>
		</tr>

	</table>
	<hr>
	<h4>Produtos</h4>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome do produto</th>
				<th>SKU</th>
				<th>Quantidade</th>
				<th>Preço</th>
				<th>Total taxas</th>
				<th>Total</th>
			</tr>
		</thead>
		@foreach( $order['line_items'] as $product)
			<td>
				{{$product['id']}}
			</td>
			<td>{{ $product['name']}}</td>
			<td>{{ $product['sku']}}</td>
			<td>{{ $product['quantity']}}</td>
			<td>{{ $product['price']}}€</td>
			<td>{{ $product['total_tax']}}€</td>
			<td>{{ $product['total']}}€</td>
		@endforeach

	</table>
	<hr>
	<h4>Envio e faturação</h4>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Campo</th>
				<th>Informação</th>
			</tr>
		</thead>
		<tr>
			<td>Dados de Faturação</td>
			<td>
				<strong> Nome: </strong> {{ $order['billing']['first_name'] }} {{ $order['billing']['last_name'] }} <br>
				@if(!empty($order['billing']['company']))
					<strong>Companhia: </strong> {{ $order['billing']['company'] }} <br>
				@endif <br>
				<strong>Morada: </strong> {{ $order['billing']['address_1'] }} <br>
				{{ $order['billing']['address_2'] }} <br><br>
				<strong>Cidade: </strong> {{ $order['billing']['city'] }} <br>
				<strong>Código Postal: </strong> {{ $order['billing']['postcode'] }} <br>
				<strong>Código País: </strong> {{ $order['billing']['country'] }} <br><br>
				<strong>Email: </strong> {{ $order['billing']['email'] }} <br> 
				<strong>Telefone: </strong> {{ $order['billing']['phone'] }}
			</td>
		</tr>
		<tr>
			<td>Dados de Envio</td>
			<td>
				<strong> Nome: </strong> {{ $order['shipping']['first_name'] }} {{ $order['shipping']['last_name'] }} <br>
				@if(!empty($order['shipping']['company']))
					<strong>Companhia: </strong> {{ $order['shipping']['company'] }} <br>
				@endif <br>
				<strong>Morada: </strong> {{ $order['shipping']['address_1'] }} <br>
				{{ $order['shipping']['address_2'] }} <br><br>
				<strong>Cidade: </strong> {{ $order['shipping']['city'] }} <br>
				<strong>Código Postal: </strong> {{ $order['shipping']['postcode'] }} <br>
				<strong>Código País: </strong> {{ $order['shipping']['country'] }}
			</td>
		</tr>
		<tr>
			<td>Notas do comprador</td>
			<td>
				@if(!empty($order['customer_note']))
					{{ $order['customer_note'] }}
				@else
					Sem notas.
				@endif
			</td>
		</tr>

	</table>

	<hr>
	<h4>Estado da encomenda</h4>

	{!! Form::open(['url' => 'orders/' . $order['id'], 'method' => 'put']) !!}

		<div class="form-group">
			<label for="tax_class">Escolha o estado da encomenda</label>
			{!! Form::select('status', 
				[
					'completed' => 'Concluída',
					'pending' => 'Recebida (pendente pagamento)',
					'processing' => 'Em processamento',
					'on-hold' => 'Aguarda confirmação de pagamento',
					'cancelled' => 'Cancelada',
					'refunded' => 'Reembolsada',
					'failed' => 'Falhada',
				], 
				$order['status'], 
				['class' => 'form-control']) 
			!!}
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Alterar o estado</button>
		</div>
		<span class="action delete-edit">Eliminar o a encomenda</span>
		
	{!! Form::close() !!}
	<div class="hidden">
		{!! Form::open(['method' => 'delete', 'id' => 'delete_form']) !!}
			<input type="text" name="id">
		{!! Form::close() !!}
	</div>
@endsection