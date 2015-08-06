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
		
		{!! Form::model($categoria, ['route'=>['categorias.atualizar',$categoria->id], 'method'=>'put'])  !!}

		@include('categorias._form')

		<div class='form-group'>
			<button type='submit' class='btn btn-primary'>
				<span class='glyphicon glyphicon-ok'></span> Editar Categoria
			</button>	
		</div>
		{!! Form::close() !!}
	</div>
@endsection