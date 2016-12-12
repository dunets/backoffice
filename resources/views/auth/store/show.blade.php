@extends('layouts.app')

@section('lateral')
	@include('auth.store.lateral')
@endsection

@section('content')
	<h1>Editar produto</h1>
	<form action="#" method="post">
		<div class="crf-box hidden">{{ csrf_field() }}</div>
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
			<textarea id="description" class="form-control" rows="6">{!! $produto['description'] !!}</textarea>
		</div>
	</form>
@endsection