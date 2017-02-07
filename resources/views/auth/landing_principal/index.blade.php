@extends('layouts.app')

@section('land_active')
active
@endsection

@section('landing_active')
active
@endsection

@section('lateral')
	@include('auth.lateral.landing')
@endsection

@section('content')

	<h1>Campos da landing-page principal</h1>

	@if(count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	@if (\Session::has('success'))
		<div class="alert alert-success">
			<p>{!! \Session::get('success') !!}</p>
		</div>
	@endif

	{!! Form::open(['url' => 'landing' . '/' . $data['id'], 'method' => 'patch', 'novalidate']) !!}
		<h4>Produto em destaque</h4>
		<div class="form-group">
			<label for="name">ID do produto em destaque *</label>
			<input class="form-control" type="text" name="id_destaque" placeholder="ID do produto" value="{{ $data['id_destaque'] }}" required>
		</div>
		<div class="form-group">
			<label for="titulo_destaque">Título do produto em destaque *</label>
			<input class="form-control" type="text" name="titulo_destaque" placeholder="Título do produto" value="{{ $data['titulo_destaque'] }}" required>
		</div>
		<div class="form-group">
			<label for="desc_destaque">Descrição do produto em destaque *</label>
			<textarea class="form-control" rows="3" name="desc_destaque" placeholder="Descrição do produto" required>{{ $data['desc_destaque'] }}</textarea>
		</div>
		<div class="form-group">
			<label for="img_destaque">URL da imagem do produto em destaque *</label>
			<input class="form-control" type="text" name="img_destaque" placeholder="URL da imagem do produto" value="{{ $data['img_destaque'] }}" required>
		</div>
		<div class="form-group">
			<label for="url_destaque">URL do produto em destaque *</label>
			<input class="form-control" type="text" name="url_destaque" placeholder="URL do produto" value="{{ $data['url_destaque'] }}" required>
		</div>
		<hr>
		<h4>Características do produto em destaque</h4>
		<div class="form-group">
			<label for="img_destaque_down">URL da imagem do produto em destaque (baixo) *</label>
			<input class="form-control" type="text" name="img_destaque_down" placeholder="URL da imagem do produto" value="{{ $data['img_destaque_down'] }}" required>
		</div>
		<div class="form-group">
			<label for="features_title_1">Título da característica 1 *</label>
			<input class="form-control" type="text" name="features_title_1" placeholder="Título da caracrerística" value="{{ $data['features_title_1'] }}" required>
		</div>
		<div class="form-group">
			<label for="features_desc_1">Descrição da característica 1 *</label>
			<textarea class="form-control" rows="3" name="features_desc_1" placeholder="Descrição da característica" required>{{ $data['features_desc_1'] }}</textarea>
		</div>
		<div class="form-group">
			<label for="features_title_2">Título da característica 2 *</label>
			<input class="form-control" type="text" name="features_title_2" placeholder="Título da caracrerística" value="{{ $data['features_title_2'] }}" required>
		</div>
		<div class="form-group">
			<label for="features_desc_2">Descrição da característica 2 *</label>
			<textarea class="form-control" rows="3" name="features_desc_2" placeholder="Descrição da característica" required>{{ $data['features_desc_2'] }}</textarea>
		</div>
		<div class="form-group">
			<label for="features_title_3">Título da característica 3 *</label>
			<input class="form-control" type="text" name="features_title_3" placeholder="Título da caracrerística" value="{{ $data['features_title_3'] }}" required>
		</div>
		<div class="form-group">
			<label for="features_desc_3">Descrição da característica 3 *</label>
			<textarea class="form-control" rows="3" name="features_desc_3" placeholder="Descrição da característica" required>{{ $data['features_desc_3'] }}</textarea>
		</div>
		<div class="form-group">
			<label for="features_title_4">Título da característica 4 *</label>
			<input class="form-control" type="text" name="features_title_4" placeholder="Título da caracrerística" value="{{ $data['features_title_4'] }}" required>
		</div>
		<div class="form-group">
			<label for="features_desc_4">Descrição da característica 4 *</label>
			<textarea class="form-control" rows="3" name="features_desc_4" placeholder="Descrição da característica" required>{{ $data['features_desc_4'] }}</textarea>
		</div>
		<div class="form-group">
			<label for="features_title_5">Título da característica 5 *</label>
			<input class="form-control" type="text" name="features_title_5" placeholder="Título da caracrerística" value="{{ $data['features_title_5'] }}" required>
		</div>
		<div class="form-group">
			<label for="features_desc_5">Descrição da característica 5 *</label>
			<textarea class="form-control" rows="3" name="features_desc_5" placeholder="Descrição da característica" required>{{ $data['features_desc_5'] }}</textarea>
		</div>
		<div class="form-group">
			<label for="features_title_6">Título da característica 6 *</label>
			<input class="form-control" type="text" name="features_title_6" placeholder="Título da caracrerística" value="{{ $data['features_title_6'] }}" required>
		</div>
		<div class="form-group">
			<label for="features_desc_6">Descrição da característica 6 *</label>
			<textarea class="form-control" rows="3" name="features_desc_6" placeholder="Descrição da característica" required>{{ $data['features_desc_6'] }}</textarea>
		</div>
		<hr>
		<h4>Linha de produtos em destaque</h4>
		<div class="form-group">
			<label for="img_destaque_line">URL da imagem da linha produtos em destaque (baixo) *</label>
			<input class="form-control" type="text" name="img_destaque_line" placeholder="URL da imagem do produto" value="{{ $data['img_destaque_line'] }}" required>
		</div>
		<div class="form-group">
			<label for="title_destaque_line">Título da linha de produtos *</label>
			<input class="form-control" type="text" name="title_destaque_line" placeholder="Título da linha" value="{{ $data['title_destaque_line'] }}" required>
		</div>
		<div class="form-group">
			<label for="desc_destaque_line">Descrição da linha de produtos *</label>
			<textarea class="form-control" rows="3" name="desc_destaque_line" placeholder="Descrição da linha em destaque" required>{{ $data['desc_destaque_line'] }}</textarea>
		</div>
		<div class="form-group">
			<label for="url_destaque_line">URL da linha de produtos *</label>
			<input class="form-control" type="text" name="url_destaque_line" placeholder="URL da linha em destaque" value="{{ $data['url_destaque_line'] }}" required>
		</div>

		<hr>
		<h4>Outras informações</h4>
		<div class="form-group">
			<label for="receive_email">Email de recepção das mensagens *</label>
			<input class="form-control" type="email" name="receive_email" placeholder="Email de recepção" value="{{ $data['receive_email'] }}" required>
		</div>
		<div class="form-group">
			<label for="contact_text">Texto de "Contactos" *</label>
			<textarea class="form-control short-text-editor" rows="3" name="contact_text" placeholder="Texto a aparecer em Contactos" required>{{ $data['contact_text'] }}</textarea>
		</div>

		<hr>
		<hr>
		<h4>SEO</h4>
		<div class="form-group">
			<label for="seo_title">Título da página *</label>
			<input class="form-control" type="text" name="seo_title" placeholder="Título da página" value="{{ $data['seo_title'] }}" required>
		</div>
		<div class="form-group">
			<label for="seo_keywords">Keywords (Palavras-chave) *</label>
			<input class="form-control" type="text" name="seo_keywords" placeholder="Palavras chave" value="{{ $data['seo_keywords'] }}" required>
		</div>
		<div class="form-group">
			<label for="seo_desc">Descrição *</label>
			<input class="form-control" type="text" name="seo_desc" placeholder="Palavras chave" value="{{ $data['seo_desc'] }}" required>
		</div>
		<hr>
		<div class="form-group">
			<label for="seo_og_title">SOCIAL: Título da página (og) *</label>
			<input class="form-control" type="text" name="seo_og_title" placeholder="Título da página" value="{{ $data['seo_og_title'] }}" required>
		</div>
		<div class="form-group">
			<label for="seo_og_desc">SOCIAL: Descrição da página (og) *</label>
			<input class="form-control" type="text" name="seo_og_desc" placeholder="Título da página" value="{{ $data['seo_og_desc'] }}" required>
		</div>
		<div class="form-group">
			<label for="seo_og_url">SOCIAL: Previsualização da página (og) *</label>
			<input class="form-control" type="text" name="seo_og_url" placeholder="Título da página" value="{{ $data['seo_og_url'] }}" required>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Guardar alterações</button>
		</div>
		
	{!! Form::close() !!}
@endsection