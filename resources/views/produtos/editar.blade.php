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
		
		{!! Form::open(['route'=>['produtos.atualizar',$produto->id], 'method'=>'put']) !!}
		<div class='form-group'>
			{!! Form::label('name', 'Nome:') !!}
			{!! Form::text('name', $produto->name, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('description', 'Descrição:') !!}
			{!! Form::textarea('description', $produto->description, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('price', 'Preço:') !!}
			{!! Form::number('price', $produto->price, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('featured', 'Featured') !!} {!! Form::checkbox('featured', 1, $produto->featured) !!}<br>
			{!! Form::label('recommend', 'Recommend') !!} {!! Form::checkbox('recommend', 1, $produto->recommend) !!}
		</div>
		<div class='form-group'>
			{!! Form::submit('Editar Produto', ['class'=>'btn btn-primary form-control']) !!}
		</div>
		{!! Form::close() !!}
	</div>
@endsection