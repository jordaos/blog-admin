@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<b-breadcrumb :items="{{$breadcrumbList}}"></b-breadcrumb>
			<panel-component title="Novo artigo" color="dark">
				<form-component method="{{empty($user) ? 'POST' : 'PUT'}}" action="{{empty($user) ? route('users.store') : route('users.update', $user->id) }}" token="{{ csrf_token() }}">
					<div class="form-group">
						<label for="nameInput">Nome</label>
						<input type="text" name="name" class="form-control" id="nameInput" value="{{ old('name', (!empty($user) ? $user->name : '')) }}"
						 placeholder="Nome do usuário">
						@if ($errors->has('name'))
						<label for="nameInput" class="form-text small text-danger">{{$errors->first('name')}}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="emailInput">E-mail</label>
						<input type="text" name="email" class="form-control" id="emailInput" value="{{ old('email', (!empty($user) ? $user->email : '')) }}"
						 placeholder="E-mail do usuário">
						@if ($errors->has('email'))
						<label for="emailInput" class="form-text small text-danger">{{$errors->first('email')}}</label>
						@endif
					</div>
					<div class="form-group">
						<label for="passwordInput">Senha</label>
						<input type="password" name="password" class="form-control" id="passwordInput" value="{{ old('password') }}"
						 placeholder="Senha">
						@if ($errors->has('password'))
						<label for="passwordInput" class="form-text small text-danger">{{$errors->first('password')}}</label>
						@endif
					</div>
					
					<button type="submit" class="btn btn-primary btn-block">Enviar</button>
				</form-component>
			</panel-component>
		</div>
	</div>
</div>
@endsection