@extends('store.store')

@section('content')
<div class='container'>	
	<h3>Meus Pedidos</h3>

	<table class='table table-striped table-bordered'>
		<tbody>
			<tr>
				<th>#ID</th>
				<th>Itens</th>
				<th>Valor</th>
				<th>Status</th>
				<th>Criado Em</th>
			</tr>
			@forelse($orders as $order)
				<tr>
					<td>{{ $order->id }}</td>
					<td>
						<ul class='list-unstyled'>

							@foreach($order->itens as $item)
								<li>{{ $item->qtd }}x {{ $item->produto->name }}</li>
							@endforeach

						</ul>
					</td>
					<td>R$ {{ $order->total }}</td>
					<td>{{ $order->statusText }}</td>
					<td>{{ date('d/m/Y H:i:s', strtotime($order->created_at)) }}</td>
				</tr>
			@empty
				<tr>
					<td colspan='4'>Nenhuma ordem de serviço.</td>					
				</tr>
			@endforelse
		</tbody>		
	</table>


</div>
@stop