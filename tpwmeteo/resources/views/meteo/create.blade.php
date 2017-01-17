@extends("layout")
@section("content")

	@if(count($errors) > 0)
		<div class="alert alert-danger">
		@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
		</div>
	@endif

	<form action="/meteo" method="post">
		
		{{ csrf_field() }}
		
		<div class="form-group">
			<label for="day_of_week">Dia da Semana</label>
			<select class="form-control" name="day_of_week">
				<option value="1">Domingo</option>
				<option value="2">Segunda</option>
				<option value="3">Terça</option>
				<option value="4">Quarta</option>
				<option value="5">Quinta</option>
				<option value="6">Sexta</option>
				<option value="7">Sábado</option>
			</select>
		</div>
		<div class="form-group">
			<label for="weather">Estado do Tempo</label>
			<select class="form-control" name="weather">
				<option value="c">Chuva</option>
				<option value="s">Sol</option>
			</select>
		</div>
		<div class="form-group">
			<label for="temperature">Temperatura</label>
			<input type="text" class="form-control" name="temperature">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Criar previsão</button>
		</div>
	</form>

@endsection