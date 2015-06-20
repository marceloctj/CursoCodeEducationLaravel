@extends('app')

@section('content')
	<div class='container'>
		<h1>Editar Categoria: {{ $categoria->name }}</h1>

		@if ($errors->any())
			<ul class='alert'>
				@foreach($errors->all() as $error)					
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		
		{!! Form::open(['route'=>['categorias.atualizar',$categoria->id], 'method'=>'put'])  !!}
		<div class='form-group'>
			{!! Form::label('name', 'Nome:') !!}
			{!! Form::text('name', $categoria->name, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('description', 'Descrição:') !!}
			{!! Form::textarea('description', $categoria->description, ['class'=>'form-control']) !!}
		</div>

		<div class='form-group'>
			{!! Form::submit('Editar Categoria', ['class'=>'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
@endsection