@extends('layouts.app')

@section('content')
	
	<h1>Criar um novo utilizador</h1>

	@if(count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	{!! Form::open(['url' => 'users/' . $user['id'], 'method' => 'patch']) !!}
	<div class="form-group">
		<label for="name">Nome</label>
		<input class="form-control" type="text" name="name" placeholder="Nome do utilizador" value="{{ $user['name'] }}">
	</div>
	<div class="form-group">
		<label for="name">Email</label>
		<input class="form-control" type="email" name="email" placeholder="Email do utilizador" value="{{ $user['email'] }}">
	</div>
	<div class="form-group">
		<label for="name">Senha</label>
		<input class="form-control" type="password" name="password" placeholder="Crie uma password">
	</div>
	<div class="form-group">
		<label for="name">Repita a Senha</label>
		<input class="form-control" type="password" name="password_repeat" placeholder="Repita a password">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Editar</button>
	</div>
	{!! Form::close() !!}
	
@endsection