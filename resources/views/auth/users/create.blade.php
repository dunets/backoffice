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

	{!! Form::open(['url' => 'users/', 'method' => 'post']) !!}
	<div class="form-group">
		<label for="name">Nome *</label>
		<input class="form-control" type="text" name="name" placeholder="Nome do utilizador" required>
	</div>
	<div class="form-group">
		<label for="name">Email *</label>
		<input class="form-control" type="email" name="email" placeholder="Email do utilizador" required>
	</div>
	<div class="form-group">
		<label for="name">Senha *</label>
		<input class="form-control" type="password" name="password" placeholder="Crie uma password" required>
	</div>
	<div class="form-group">
		<label for="name">Repita a Senha *</label>
		<input class="form-control" type="password" name="password_repeat" placeholder="Repita a password" required>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Criar</button>
	</div>
	{!! Form::close() !!}
	
@endsection