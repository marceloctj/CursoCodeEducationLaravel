@extends('app')

@section('content')
	<div class='container'>
		<h1>Cadastrar Produto</h1>

		@if ($errors->any())
			<ul class='alert'>
				@foreach($errors->all() as $error)					
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		
		{!! Form::open(['route'=>'produtos.adicionar'])  !!}
		<div class='form-group'>
			{!! Form::label('name', 'Nome:') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('description', 'Descrição:') !!}
			{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('price', 'Preço:') !!}
			{!! Form::number('price', null, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('featured', 'Featured') !!} {!! Form::checkbox('featured', 1) !!}<br>
			{!! Form::label('recommend', 'Recommend') !!} {!! Form::checkbox('recommend', 1) !!}
		</div>
		<div class='form-group'>
			<button type='submit' class='btn btn-primary form-control'>
				<span class='glyphicon glyphicon-ok'></span> Cadastrar Produto
			</button>			
		</div>
		{!! Form::close() !!}
	</div>
@endsection