@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<b-breadcrumb :items="{{$breadcrumbList}}"></b-breadcrumb>
			<panel-component title="Novo artigo" color="dark">
				<form-component method="{{empty($article) ? 'POST' : 'PUT'}}" action="{{empty($article) ? route('articles.store') : route('articles.update', $article->id) }}" token="{{ csrf_token() }}">
					<div class="form-group">
						<label for="titleInput">Título</label>
						<input type="text" name="title" class="form-control" id="titleInput" value="{{ old('title', (!empty($article) ? $article->title : '')) }}"
						 placeholder="Digite o título da publicação"> @if ($errors->has('title'))
						<label for="titleInput" class="form-text small text-danger">{{$errors->first('title')}}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="descriptionTextarea">Descrição</label>
						<textarea name="description" class="form-control" id="descriptionTextarea" rows="3" placeholder="Descrição...">{{ old('description', (!empty($article) ? $article->description : '')) }}</textarea> @if ($errors->has('description'))
						<label for="descriptionTextarea" class="form-text small text-danger">{{$errors->first('description')}}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="dateInput">Data</label>
						<datetime name="publish" type="datetime" id="dateInput" input-class="form-control" format="yyyy-MM-dd HH:mm" min-datetime="{{ date('Y-m-d H:i:s') }}"></datetime>
						@if ($errors->has('publish'))
						<label for="dateInput" class="form-text small text-danger">{{$errors->first('publish')}}</label>
						@endif
					</div>
					<button type="submit" class="btn btn-primary btn-block">Enviar</button>
				</form-component>
			</panel-component>
		</div>
	</div>
</div>
@endsection