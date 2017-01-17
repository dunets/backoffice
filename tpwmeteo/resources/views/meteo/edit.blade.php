@extends("layout")
@section("content")

{{ Form::open(["route" => ["meteo.update", $meteo->id], "method" => "PATCH"]) }}

@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

		<div class="form-group">
			<label for="day_of_week">Dia da Semana</label>
			
			{{ Form::select('day_of_week', ['1' => 'Domingo', '2' => 'Segunda', '3' => 'Terça', '4' => 'Quarta', '5' => 'Quinta', '6' => 'Sexta', '7' => 'Sábado'], $meteo->day_of_week, ['class' => 'form-control']) }}
			
		</div>
		<div class="form-group">
			<label for="weather">Estado do Tempo</label>
			
			{{ Form::select('weather', ['c' => 'Chuva', 's' => 'Sol'], $meteo->weather, ['class' => 'form-control']) }}
			
		</div>
		<div class="form-group">
			<label for="temperature">Temperatura</label>
			<input type="text" class="form-control" name="temperature" value="{{ $meteo->temperature }}">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Atualizar previsão</button>
		</div>
	

{{ Form::close() }}

@endsection