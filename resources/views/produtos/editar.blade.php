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
		
		{!! Form::open(['route'=>['produtos.atualizar',$produto->id], 'method'=>'put']) !!}
		<div class='form-group'>
			{!! Form::label('nome', 'Nome:') !!}
			{!! Form::text('nome', $produto->nome, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('descricao', 'Descrição:') !!}
			{!! Form::textarea('descricao', $produto->descricao, ['class'=>'form-control']) !!}
		</div>
		<div class='form-group'>
			{!! Form::label('preco', 'Preço:') !!}
			{!! Form::number('preco', $produto->preco, ['class'=>'form-control']) !!}
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