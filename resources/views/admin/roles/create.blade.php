@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<b-breadcrumb :items="{{$breadcrumbList}}"></b-breadcrumb>
			<panel-component title="Nova Função" color="dark">
				<form-component method="{{empty($role) ? 'POST' : 'PUT'}}" action="{{empty($role) ? route('roles.store') : route('roles.update', $role->id) }}" token="{{ csrf_token() }}">
					<div class="form-group">
						<label for="nameInput">Nome</label>
						<input type="text" name="name" class="form-control" id="nameInput" value="{{ old('name', (!empty($role) ? $role->name : '')) }}"
						 placeholder="Nome da função">
						@if ($errors->has('name'))
						<label for="nameInput" class="form-text small text-danger">{{$errors->first('name')}}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="descriptionTextarea">Descrição</label>
						<textarea name="description" class="form-control" id="descriptionTextarea" rows="3" placeholder="Descrição...">{{ old('description', (!empty($role) ? $article->description : '')) }}</textarea> 
						@if ($errors->has('description'))
						<label for="descriptionTextarea" class="form-text small text-danger">{{$errors->first('description')}}</label>
						@endif
					</div>
					
					<button type="submit" class="btn btn-primary btn-block">Enviar</button>
				</form-component>
			</panel-component>
		</div>
	</div>
</div>
@endsection