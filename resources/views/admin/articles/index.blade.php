@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<b-breadcrumb :items="{{$breadcrumbList}}"></b-breadcrumb>
			<panel-component title="Lista de artigos" color="dark">
                <table-page
                    v-bind:titles="['id','título']"
                    v-bind:items="[{'id': 1, 'title': 'Teste 01'}, {'id': 2, 'title': 'Teste 02'}]"
                    url="{{route('articles.index')}}"></table-page>
			</panel-component>
		</div>
	</div>
</div>
@endsection