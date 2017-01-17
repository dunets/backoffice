@extends("layout")

@section("index")
active
@endsection
@section("content")

<div class="table-responsive">
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Country</th>
			<th>Capital</th>
			<th>Population</th>
			<th></th>
		</tr>
		@foreach($countries as $country)
			<tr>
				<td>{{ $country->id }}</td>
				<td>{{ $country->country }}</td>
				<td>{{ $country->capital }}</td>
				<td>{{ $country->population }}</td>
				<td><a id_field="{{ $country->id }}" class="delete btn btn-danger btn-sm">Apagar</a></td>
			</tr>
		@endforeach
	</table>
</div>
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
			form.attr('action', '/world/' + $(this).attr('id_field'));
			form.submit();
		})
	})
</script>

@endsection("content")