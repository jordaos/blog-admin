@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<b-breadcrumb :items="{{ $breadcrumbList }}"></b-breadcrumb>
			<panel-component title="Lista de artigos" color="dark">
                <table-page
                    v-bind:titles="['#','título', 'Descrição', 'Data de publicação']"
                    v-bind:items="{{ $articleList }}"
                    url="{{route('articles.index')}}"></table-page>
			</panel-component>
		</div>
	</div>
</div>
@endsection