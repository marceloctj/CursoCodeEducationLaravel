@extends('app')

@section('content')	 	
	<div class='container'>
		<h1 class='clearfix'>Imagens do Produto {{ $produto->name }}</h1>

		<a href="{{ route('produtos.imagens.cadastrar',$produto->id) }}" class='btn btn-primary'>
			<span class='glyphicon glyphicon-plus' aria-hidden="true"></span> Nova Imagem
		</a>
		<br><br>
		<table class='table table-hover'>
			<tr>
				<th>ID</th>	
				<th>Imagem</th>	
				<th>Extenção</th>				
				<th>Ações</th>
			</tr>
			@forelse($produto->imagens as $imagem)
				<tr>
					<td>{{ $imagem->id }}</td>
					<td><img src={{ url('uploads/produto_' . $produto->id . '_imagem_' . $imagem->id . '.' . $imagem->extension) }} width='100'></td>
					<td>{{ $imagem->extension }}</td>					
					<td>	
						<a href='{{route('produtos.imagens.deletar',['id'=>$imagem->id])}}'>Deletar</a>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan='7'>Nenhuma imagem do produto encontrada!</td>
				</tr>
			@endforelse			
		</table>	
		<a href='{{ route('produtos')}}' class='btn btn-default'>Voltar</a>
	</div>	
@endsection