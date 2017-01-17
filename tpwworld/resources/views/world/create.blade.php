@extends("layout")
@section("create")
active
@endsection
@section("content")

@if(count($errors) > 0)
	<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach
	</div>
@endif

	{!! Form::open(['url' => '/world']) !!}

	<div class="form-group">
			<label for="country">País</label>
			<input type="text" class="form-control" id="country"name="country" placeholder="Insira o nome do país a obter">
	</div>
	<div>
			<button type="button" class="btn btn-primary" id="obter-info">Obter informações</button>
	</div>
	<div class="form-group">
			<br>
			<label for="capital">Capital</label>
			<input class="form-control" id="capital" name="capital" type="text" readonly>
	</div>
	<div class="form-group">
			<label for="population">População</label>
			<input class="form-control" id="population" name="population" type="text" readonly>
	</div>
	 <div>
			<button type="submit" class="btn btn-success">Inserir País</button>
	</div>

{!! Form::close() !!}

<script>
	$(document).ready(function(){
		$('#obter-info').click(function(){
			$.ajax('https://restcountries.eu/rest/v1/name/' + $('#country').val(), {
				success : function(data){
					$('#capital').val(data[0].capital);
					$('#population').val(data[0].population);
				}
			});
		});
	});
</script>

@endsection("content")