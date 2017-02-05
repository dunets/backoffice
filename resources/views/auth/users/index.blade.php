@extends('layouts.app')

@section('content')
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	<div class="col-md-9">
		<h1>Utilizadores</h1>
	</div>
	<div class="col-md-3">
		<a href="{{ url('users/create') }}" class="btn btn-primary btn-lg" style="float:right; margin-top: 20px;">Criar novo</a>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Ações</th>
			</tr>
		</thead>
		@if(!empty($data))
			@foreach($data as $user)
				<tr>
					<td>
						{{$user['id']}}
					</td>
					<td>
						{{$user['name']}}
					</td>
					<td>
						{{$user['email']}}
					</td>
					<td>
						<div class="btn-group btn-group-primary">
								<a href="{{ url('users')}}/{{$user['id']}}" class="btn btn-primary" type="button">Editar</a>
							<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"><span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="{{ url('users')}}/{{$user['id']}}" class="action delete-user">Apagar</a></li>
							</ul>
						</div>
					</td>
				</tr>
			@endforeach
		@endif
	</table>

	<div class="hidden">
		{!! Form::open(['method' => 'delete', 'id' => 'delete_form']) !!}
			<input type="text" name="id">
		{!! Form::close() !!}
	</div>

@endsection