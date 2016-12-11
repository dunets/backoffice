@extends('layouts.app')

@section('lateral')
	@include('auth.home.lateral')
@endsection

@section('content')

	@if(!empty($data))
		{{ var_dump($data) }}
	@endif

	<h3>Erros:</h3>
	{{ var_dump($errors) }}
@endsection