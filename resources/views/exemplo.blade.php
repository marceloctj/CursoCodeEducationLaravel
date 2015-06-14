<h1>Exemplo</h1>
<ul>
	@foreach($categorias as $categoria)
		<li>{{ $categoria->nome }}</li>
	@endforeach
</ul>