@extends('app')

@section('content')
	<div class='container'>
		<h1>Cadastrar Categoria</h1>

		@if ($errors->any())
			<ul class='alert'>
				@foreach($errors->all() as $error)					
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		
		{!! Form::open(['route'=>'categorias.adicionar'])  !!}
		<div class='form-group'>
			{!! Form::label('nome', 'Nome:') !!}
			{!! Form::text('nome', null, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('descricao', 'Descrição:') !!}
			{!! Form::textarea('descricao', null, ['class'=>'form-control']) !!}
		</div>

		<div class='form-group'>
			{!! Form::submit('Cadastrar Categoria', ['class'=>'btn btn-primary form-control']) !!}
		</div>
		{!! Form::close() !!}
	</div>
@endsection