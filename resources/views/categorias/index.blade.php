@extends('app')

@section('content')
	<div class='container'>
		<h1>Categorias</h1>

		<a href="{{ route('categorias.cadastrar') }}" class='btn btn-default'>Cadastrar</a><br><br>

		<table class='table'>
			<tr>
				<th>ID</th>	
				<th>Nome</th>	
				<th>Descrição</th>	
				<th>Ações</th>
			</tr>		
			@foreach($categorias as $categoria)
			<tr>
				<td>{{ $categoria->id }}</td>
				<td>{{ $categoria->nome }}</td>
				<td>{{ $categoria->descricao }}</td>
				<td>
					<a href="{{route('categorias.editar',['id'=>$categoria->id])}}">Editar</a>|
					<a href="{{route('categorias.deletar',['id'=>$categoria->id])}}">Deletar</a>
				</td>
			</tr>
			@endforeach
		</table>		
	</div>
@endsection