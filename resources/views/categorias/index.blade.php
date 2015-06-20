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
			@forelse($categorias as $categoria)
			<tr>
				<td>{{ $categoria->id }}</td>
				<td>{{ $categoria->name }}</td>
				<td>{{ $categoria->description }}</td>
				<td>
					<a href="{{route('categorias.editar',['id'=>$categoria->id])}}">Editar</a> | 
					<a href="{{route('categorias.deletar',['id'=>$categoria->id])}}">Deletar</a>
				</td>
			</tr>
			@empty
				<tr>
					<td colspan='4'>Nenhuma categoria encontrado!</td>
				</tr>
			@endforelse
		</table>	
		<div class='pull-right'>
			{!! $categorias->render() !!}	
		</div>
	</div>
@endsection