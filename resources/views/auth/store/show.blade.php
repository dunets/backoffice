@extends('layouts.app')

@section('lateral')
	@include('auth.store.lateral')
@endsection

@section('content')
	<form action="#" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<h2>
				<label for="name">Nome do produto</label>
			</h2>
			<input class="form-control" type="text" name="name" placeholder="Nome do produto" value="{{ $produto['name'] }}">
		</div>
		<div class="form-group">
			<label for="permalink">Link permanente</label>
			<input class="form-control" type="text" name="permalink" placeholder="Link permanente" value="{{ $produto['permalink'] }}">
		</div>
		<hr>
	</form>
@endsection