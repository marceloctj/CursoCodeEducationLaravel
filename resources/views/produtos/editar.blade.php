@extends('app')

@section('content')
	<div class='container'>
		<h1>Editar Produto: {{ $produto->name }}</h1>

		@if ($errors->any())
			<ul class='alert'>
				@foreach($errors->all() as $error)					
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		
		{!! Form::model($produto, ['route'=>['produtos.atualizar',$produto->id], 'method'=>'put']) !!}

		@include('produtos._form')
		
		<div class='form-group'>
			<button type='submit' class='btn btn-primary'>
				<span class='glyphicon glyphicon-ok'></span> Editar Produto
			</button>	
		</div>
		{!! Form::close() !!}
	</div>
@endsection