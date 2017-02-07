@extends('layouts.app')

@section('store_active')
active
@endsection

@section('orders_active')
active
@endsection

@section('lateral')
	@include('auth.lateral.storeOrders')
@endsection

@section('content')
	<h1>Encomendas</h1>

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

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Número</th>
				<th>Id comprador</th>
				<th>Estado</th>
				<th>Data</th>
				<th>Ações</th>
			</tr>
		</thead>
		@if(!empty($data))
			@foreach($data as $order)
				<tr>
					<td>
						{{$order['id']}}
					</td>
					<td>{{ $order['number']}}</td>
					<td>{{ $order['customer_id'] }}</td>
					<td>
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
					</td>
					<td>
						Última atualização: <br>
						{{ date('d/m, Y', strtotime($order['date_modified'])) }}
					</td>
					<td>
						<div class="btn-group btn-group-primary">
								<a href="{{ url('orders')}}/{{$order['id']}}" class="btn btn-primary" type="button">Editar</a>
							<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"><span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="{{ url('orders')}}/{{$order['id']}}" class="action delete-orders-list">Apagar</a></li>
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