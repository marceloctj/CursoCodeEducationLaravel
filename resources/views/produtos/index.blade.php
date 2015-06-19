@extends('app')

@section('content')
	<div class='container'>
		<h1>Produtos</h1>

		<a href="{{ route('produtos.cadastrar') }}" class='btn btn-default'>Cadastrar</a><br><br>

		<table class='table'>
			<tr>
				<th>ID</th>	
				<th>Nome</th>	
				<th>Descrição</th>	
				<th>Preço</th>
				<th>Ações</th>
			</tr>
			@foreach($produtos as $produto)
				<tr>
					<td>{{ $produto->id }}</td>
					<td>{{ $produto->nome }}</td>
					<td>{{ $produto->descricao }}</td>
					<td>R$ {{ $produto->preco }}</td>
					<td>
						<a href="{{route('produtos.editar',['id'=>$produto->id])}}">Editar</a> | 
						<a href="{{route('produtos.deletar',['id'=>$produto->id])}}">Deletar</a>
					</td>
				</tr>
			@endforeach
		</table>		
	</div>
@endsection