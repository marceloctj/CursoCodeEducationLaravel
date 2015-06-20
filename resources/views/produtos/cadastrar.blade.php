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
			{!! Form::label('nome', 'Nome:') !!}
			{!! Form::text('nome', null, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('descricao', 'Descrição:') !!}
			{!! Form::textarea('descricao', null, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('preco', 'Preço:') !!}
			{!! Form::number('preco', null, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('featured', 'Featured') !!} {!! Form::checkbox('featured', 1) !!}<br>
			{!! Form::label('recommend', 'Recommend') !!} {!! Form::checkbox('recommend', 1) !!}
		</div>
		<div class='form-group'>
			{!! Form::submit('Cadastrar Produto', ['class'=>'btn btn-primary form-control']) !!}
		</div>
		{!! Form::close() !!}
	</div>
@endsection