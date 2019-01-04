@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<panel-component title="Lista de artigos" color="dark">
                <table-page
                    v-bind:titles="['id','titulo']"
                    v-bind:items="[['1', 'Teste 01'], ['2', 'Teste 02']]"
                    url="{{route('articles.index')}}"
                    token=""></table-page>
			</panel-component>
		</div>
	</div>
</div>
@endsection