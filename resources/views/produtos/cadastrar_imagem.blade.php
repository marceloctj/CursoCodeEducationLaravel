@extends('app')

@section('content')
	<div class='container'>
		<h1>Cadastrar Imagem</h1>

		@if ($errors->any())
			<ul class='alert'>
				@foreach($errors->all() as $error)					
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		
		{!! Form::open(['route'=>['produtos.imagens.adicionar', $produto->id], 'method'=>'post','enctype'=>'multipart/form-data']) !!}
		<div class='form-group'>
			{!! Form::label('imagem', 'Imagem:') !!}
			{!! Form::file('imagem', ['class'=>'form-control']) !!}
		</div>

		<div class='form-group'>
			<button type='submit' class='btn btn-primary'>
				<span class='glyphicon glyphicon-ok'></span> Upload Imagem
			</button>			
		</div>
		{!! Form::close() !!}
	</div>
@endsection