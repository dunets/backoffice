@extends("layout")
@section("content")

<div style="text-align: center; margin-bottom: 20px">
    <a href="{{ url('/meteo/create') }}" class="btn btn-success btn-lg">Inserir nova previsão</a>
</div>

    @foreach($days as $day)
        <div class="weatherBox">
            <p class="dayOfWeek">{{ $day->day_of_week_name }}</p>
            <p class="icon"><i class="fa {{ $day->icon }}" aria-hidden="true"></i></p>
            <p class="temperature">{{ $day->temperature }}ºC</p>
            <p class="buttons">
                <a href="{{ url('/meteo/' . $day->id . '/edit') }}" class="btn btn-warning btn-xs">Editar</a><br>
								<a id_field="{{ $day->id }}" class="delete btn btn-danger btn-xs">Apagar</a>
            </p>
        </div>
    @endforeach

	<div class="hidden">
		<form id="delete_form" method="post">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<input type="text" name="id">
		</form>
	</div>

	<script>
			$(document).ready(function(){
				$('.delete').click(function(){
					var form = $('#delete_form');
					form.attr('action', '/meteo/' + $(this).attr('id_field'));
					form.submit();
				})
			})
		</script>

@endsection("content")