@extends('app')

@section('content')
	<div class='container'>
		<h1>Categorias</h1>

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
				<td></td>
			</tr>
			@endforeach
		</table>
	</div>
@endsection