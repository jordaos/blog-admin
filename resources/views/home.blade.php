@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
            <b-breadcrumb :items="{{$breadcrumbList}}"></b-breadcrumb>
			<panel-component
                title="Dashboard"
                color="dark">
				<div class="row">
					<div class="col-md-4">
                        <card-info-component 
                            title="Usuários"
                            color="danger"
                            count="{{ $userCount }}"
                            url="{{ route('users.index') }}"
                            icon="ion ion-person-stalker">
						</card-info-component>
					</div>
					<div class="col-md-4">
                        <card-info-component 
                            title="Artigos"
                            color="info"
                            count="{{ $articleCount }}"
                            url="{{route('articles.index')}}"
                            icon="ion ion-ios-folder">
						</card-info-component>
					</div>
					<div class="col-md-4">
                        <card-info-component
                            title="Funções"
                            color="success"
                            count="10"
                            url="{{ route('roles.index') }}"
                            icon="ion ion-pie-graph">
						</card-info-component>
					</div>
				</div>
			</panel-component>
		</div>
	</div>
</div>
@endsection