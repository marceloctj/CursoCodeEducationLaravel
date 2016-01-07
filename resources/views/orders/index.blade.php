@extends('app')

@section('content')
<div class='container'>
	<h1>Ordens de Serviço</h1>
	<table class='table table-striped'>
		<tr class='active'>
			<th>#ID</th>
			<th>Itens</th>
			<th>Valor</th>
			<th>Status</th>
			<th>Criado Em</th>
			<th>PagSeguro Ref.</th>
			<th>PagSeguro Tran.</th>
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
				<td>
					<span class='status-fixo'><a href='javascript:void(0)' class='status'>{{ $order->statusText }}</a></span>
					<span class='status-select' style='display:none'>
						{!! Form::select("status", $textStatus, $order->status) !!}
						{!! Form::button('Alterar', ['class'=>'grava-status', 'data-order'=>$order->id]) !!}
						{!! Form::button('Cancelar', ['class'=>'status-cancel', 'data-order'=>$order->id]) !!}
						{!! Form::token() !!}
					</span>
				</td>
				<td>{{ date('d/m/Y H:i:s', strtotime($order->created_at)) }}</td>
				<td>{{ $order->pag_seguro_referencia }}</td>
				<td>{{ $order->pag_seguro_transacao }}</td>
			</tr>
		@empty		
			<tr>
				<td colspan="5">Nenhuma ordem de serviço encontrada.</td>
			</tr>
		@endforelse
	</table>
</div>
@stop

@section('extrafooter')
	<script type="text/javascript">
		
		$('table').on('click','.status', function(){				
			$(this).parent().next().show();
			$(this).parent().hide();				
		})

		$('table').on('click','.status-cancel', function(){						
			$(this).parent().hide();
			$(this).parent().prev().show();
		})

		$('table').on('click','.grava-status', function(){
			var status = $(this).prev().val();
			var order  = $(this).data('order');
			var csrf   = $(this).next().next().val();
			var obj    = $(this);

			$.post('{{ route("order.status.update.ajax") }}', {'_token': csrf, 'status': status, 'id': order})
			.done(function(data){		
				data = JSON.parse(data);
				if(data.status){
					obj.parent().hide();					
					obj.parent().prev().children('a').text(data.titulo);
					obj.parent().prev().show();

					$(this).children('.status-fixo').show();
				}else{
					alert('Erro na alteração de status da Ordem de Serviço');
				}
			});
		});

	</script>
@stop