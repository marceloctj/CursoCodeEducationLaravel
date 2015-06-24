@extends('app')

@section('content')	 	
	<div class='container'>
		<h1 class='clearfix'>Produtos</h1>

		<a href="{{ route('produtos.cadastrar') }}" class='btn btn-primary'>
			<span class='glyphicon glyphicon-plus' aria-hidden="true"></span> Cadastrar
		</a>
		<br><br>
		<table class='table table-hover'>
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
					<td>{{ $produto->name }}</td>
					<td>{{ substr($produto->description,0,70) }}...</td>
					<td>R$ {{ $produto->price }}</td>
					<td>{{ ($produto->featured)? 'Sim':'Não' }}</td>
					<td>{{ ($produto->recommend)? 'Sim':'Não' }}</td>
					<td>
						<a href="{{route('produtos.editar',['id'=>$produto->id])}}"><span class='glyphicon glyphicon-pencil'></span></a> | 
						<a href="{{route('produtos.deletar',['id'=>$produto->id])}}"><span class='glyphicon glyphicon-trash'></span></a>
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