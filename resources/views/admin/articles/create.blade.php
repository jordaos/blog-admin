@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<b-breadcrumb :items="{{$breadcrumbList}}"></b-breadcrumb>
			<panel-component title="Novo artigo" color="dark">
				<form-component method="POST" action="{{route('articles.store')}}" token="{{ csrf_token() }}">
					<div class="form-group">
						<label for="titleInput">Título</label>
						<input type="text" name="title" class="form-control" id="titleInput" placeholder="Digite o título da publicação">
					</div>
					<div class="form-group">
						<label for="descriptionTextarea">Descrição</label>
						<textarea name="description" class="form-control" id="descriptionTextarea" rows="3" placeholder="Descrição..."></textarea>
					</div>
					<div class="form-group">
						<label for="dateInput">Data</label>
						<datetime
							name="publish"
							type="datetime"
							input-class="form-control"
							format="yyyy-MM-dd HH:mm"
							min-datetime="{{ date('Y-m-d H:i:s') }}"></datetime>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Enviar</button>
				</form-component>
			</panel-component>
		</div>
	</div>
</div>
@endsection