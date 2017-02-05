@extends('layouts.layout')


@section('title')
{{trans('messages.budget-title')}}
@endsection

@section('budget-active')
active
@endsection

@section('content')

<div class="form-container">
	<h2>{{trans('messages.budget-h2')}}</h2>
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<p>{{trans('messages.form-error')}}</p>
		</div>
	@endif
	
	<form action="/budget" method="post">
		{!! csrf_field() !!}
		<input type="hidden" name="locale" value="{{ App::getLocale() }}">
		<div class="input-box">
			<div class="form-b">
				<label for="name">{{trans('messages.form-name')}} *</label>
				<input type="text" name="name" required>
			</div>
			<div class="form-b">
				<label>{{trans('messages.form-tel')}} *</label>
				<input type="tel" name="tel" required>
			</div>
			<div class="form-b">
				<label>{{trans('messages.form-mail')}} *</label>
				<input type="email" name="email" required>
			</div>
			<div class="form-b">
				<label>{{trans('messages.form-mensagem')}} *</label>
				<textarea rows="6" name="mensagem"  required></textarea>
			</div>
			<div class="form-b">
				<button type="submit">{{trans('messages.form-button')}}</button>
			</div>
		</div>
	</form>
</div>

@endsection