@extends('app')

@section('content')
	<div class='container'>
		<h1>Cadastrar Categoria</h1>

		@if ($errors->any())
			<div class='alert alert-danger'>
				<ul>
				@foreach($errors->all() as $error)					
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
		@endif
		
		{!! Form::open(['route'=>'categorias.adicionar'])  !!}
		<div class='form-group'>
			{!! Form::label('name', 'Nome:') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('description', 'Descrição:') !!}
			{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
		</div>

		<div class='form-group'>
			<button type='submit' class='btn btn-primary'>
				<span class='glyphicon glyphicon-ok'></span> Editar Produto
			</button>	
		</div>
		{!! Form::close() !!}
	</div>
@endsection