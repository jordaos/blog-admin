@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<b-breadcrumb :items="{{$breadcrumbList}}"></b-breadcrumb>
			<panel-component title="Novo artigo" color="dark">
				<form-component method="POST" token="{{ csrf_token() }}">
					<div class="form-group">
						<label for="titleInput">Título</label>
						<input type="text" class="form-control" id="titleInput" placeholder="Digite o título da publicação">
					</div>
					<div class="form-group">
						<label for="descriptionTextarea">Descrição</label>
						<textarea class="form-control" id="descriptionTextarea" rows="3" placeholder="Descrição..."></textarea>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Enviar</button>
				</form-component>
			</panel-component>
		</div>
	</div>
</div>
@endsection