@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<b-breadcrumb :items="{{ $breadcrumbList }}"></b-breadcrumb>
			<panel-component title="Lista de Funções" color="dark">
                <table-page
                    v-bind:titles="['#','nome', 'descrição']"
                    v-bind:items="{{ $modelList }}"
                    url="{{route('roles.index')}}"></table-page>
			</panel-component>
		</div>
	</div>
</div>
@endsection