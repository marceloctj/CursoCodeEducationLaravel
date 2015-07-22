@extends('store.store')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-1 control-label">Nome</label>
							<div class="col-md-5">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						
							<label class="col-md-1 control-label">E-Mail</label>
							<div class="col-md-5">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-1 control-label">Senha</label>
							<div class="col-md-5">
								<input type="password" class="form-control" name="password">
							</div>
						
							<label class="col-md-1 control-label">Confirmar Senha</label>
							<div class="col-md-5">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">							
							{!! Form::label('cep', 'Cep', ['class'=>'col-md-1 control-label']) !!}
							<div class="col-md-2">
								{!! Form::text('cep', null, ['class'=>'form-control','id'=>'cep-end', 'onkeypress'=>"mascara(this, '#####-###')"]) !!}
							</div>				
						</div>								
						<div class="form-group">
							{!! Form::label('logradouro', 'Rua', ['class'=>'col-md-1 control-label']) !!}
							<div class="col-md-5">
								{!! Form::text('logradouro', null, ['id'=>'rua-end', 'class'=>'form-control']) !!}
							</div>													
							{!! Form::label('numero', ' Numero', ['class'=>'col-md-1 control-label']) !!}
							<div class="col-md-5">
								{!! Form::text('numero', null, ['class'=>'form-control']) !!}
							</div>													
						</div>
						<div class="form-group">
							{!! Form::label('complemento', 'Complem.', ['class'=>'col-md-1 control-label']) !!}
							<div class="col-md-5">
								{!! Form::text('complemento', null, ['class'=>'form-control']) !!}
							</div>							
							{!! Form::label('bairro', 'Bairro', ['class'=>'col-md-1 control-label']) !!}
							<div class="col-md-5">
								{!! Form::text('bairro', null, ['id'=>'bairro-end', 'class'=>'form-control']) !!}
							</div>							
						</div>
						<div class="form-group">							
							{!! Form::label('cidade', 'Cidade', ['class'=>'col-md-1 control-label']) !!}
							<div class="col-md-5">
								{!! Form::text('cidade', null, ['id'=>'cidade-end','class'=>'form-control']) !!}
							</div>							
							{!! Form::label('uf', 'Estado', ['class'=>'col-md-1 control-label']) !!}

							<div class="col-md-5">
								{!! Form::select('uf', $estados, null, ['id'=>'uf-end', 'class'=>'form-control']) 
								!!}
							</div>	
						</div>
						<div class="form-group">
							<div class="pull-right" style='margin-right:15px'>
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('extrafooter')
<script type="text/javascript">
	function mascara(t, mask){
		 var i = t.value.length;
		 var saida = mask.substring(1,0);
		 var texto = mask.substring(i)

		 if (texto.substring(0,1) != saida){
			 t.value += texto.substring(0,1);
 		}
 	}	 	

 	$(document).ready(function(){
 		$('#cep-end').blur(function(){
 			var cep = $(this).val().replace('-','');
 			$('#rua-end').val('');
			$('#bairro-end').val('');
			$('#cidade-end').val('');
			$('#uf-end').val('');

 			$.get("http://viacep.com.br/ws/"+cep+"/json/unicode", function(data){ 				
 				$('#rua-end').val(data.logradouro);
 				$('#bairro-end').val(data.bairro);
 				$('#cidade-end').val(data.localidade);
 				$('#uf-end').val(data.uf);
 			});
 		})
 	})
</script>
@endsection
