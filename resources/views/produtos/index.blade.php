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
				<th>Featured</th>
				<th>Recommend</th>
				<th>Ações</th>
			</tr>
			@forelse($produtos as $produto)
				<tr>
					<td>{{ $produto->id }}</td>
					<td>{{ $produto->nome }}</td>
					<td>{{ $produto->descricao }}</td>
					<td>R$ {{ $produto->preco }}</td>
					<td>{{ ($produto->featured)? 'Sim':'Não' }}</td>
					<td>{{ ($produto->recommend)? 'Sim':'Não' }}</td>
					<td>
						<a href="{{route('produtos.editar',['id'=>$produto->id])}}">Editar</a> | 
						<a href="{{route('produtos.deletar',['id'=>$produto->id])}}">Deletar</a>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan='7'>Nenhum produto encontrado!</td>
				</tr>
			@endforelse
		</table>	
		<div class='pull-right'>		
			{!! $produtos->render() !!}	
		</div>
	</div>
@endsection