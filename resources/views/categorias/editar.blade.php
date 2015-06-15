@extends('app')

@section('content')
	<div class='container'>
		<h1>Editar Categoria: {{ $categoria->nome }}</h1>

		@if ($errors->any())
			<ul class='alert'>
				@foreach($errors->all() as $error)					
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		
		{!! Form::open(['route'=>['categorias.atualizar',$categoria->id], 'method'=>'put'])  !!}
		<div class='form-group'>
			{!! Form::label('nome', 'Nome:') !!}
			{!! Form::text('nome', $categoria->nome, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('descricao', 'Descrição:') !!}
			{!! Form::textarea('descricao', $categoria->descricao, ['class'=>'form-control']) !!}
		</div>

		<div class='form-group'>
			{!! Form::submit('Editar Categoria', ['class'=>'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
@endsection