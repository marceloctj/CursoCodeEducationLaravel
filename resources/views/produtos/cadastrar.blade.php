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
		
		@include('produtos._form')

		<div class='form-group'>
			<button type='submit' class='btn btn-primary'>
				<span class='glyphicon glyphicon-ok'></span> Cadastrar Produto
			</button>			
		</div>
		{!! Form::close() !!}
	</div>
@endsection