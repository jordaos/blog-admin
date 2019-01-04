@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<panel-component
                title="Dashboard"
                color="dark">
				Teste de conteúdo..
				<div class="row">
					<div class="col-md-4">
                        <panel-component 
                            title="Conteúdo 1"
                            color="danger">
							Teste de conteúdo..
						</panel-component>
					</div>
					<div class="col-md-4">
                        <panel-component 
                            title="Conteúdo 2"
                            color="info">
							Teste de conteúdo..
						</panel-component>
					</div>
					<div class="col-md-4">
                        <panel-component
                            title="Conteúdo 3"
                            color="success">
							Teste de conteúdo..
						</panel-component>
					</div>
				</div>
			</panel-component>
		</div>
	</div>
</div>
@endsection