@extends('layouts.layout')


@section('title')
{{trans('messages.orders-title')}}
@endsection

@section('orders-active')
active
@endsection

@section('content')

<div class="slide-container" _index="">
	<div class="close-button"></div>
	<div class="slide-text"></div>
	<div class="image-container">
		<img src="" alt="plano">
	</div>
	<div class="slide-btn right"></div>
	<div class="slide-btn left"></div>
</div>

<div class="orders-container">
	<div class="form-container">
		<h2>{{trans('messages.orders-h2')}}</h2>
		<form action="/orders" method="post">
			{!! csrf_field() !!}
			<div class="radio-custom-box">
				<div class="form-box">
					<label for="type">{{trans('messages.form-type')}} *</label>
					<label class="radio-custom">
						<span class="view-image-btn"></span>
						<input type="radio" name="type" value="t0" required>
						<div class="radio-image t0"></div>
						<span class="radio-type">T0</span>
					</label>
					<label class="radio-custom">
						<span class="view-image-btn"></span>
						<input type="radio" name="type" value="t1" required>
						<div class="radio-image t1"></div>
						<span class="radio-type">T1</span>
					</label>
					<label class="radio-custom">
						<span class="view-image-btn"></span>
						<input type="radio" name="type" value="t2" required>
						<div class="radio-image t2"></div>
						<span class="radio-type">T2</span>
					</label>
					<label class="radio-custom">
						<span class="view-image-btn"></span>
						<input type="radio" name="type" value="t3" required>
						<div class="radio-image t3"></div>
						<span class="radio-type">T3</span>
					</label>
				</div>
			</div>
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
</div>


@endsection