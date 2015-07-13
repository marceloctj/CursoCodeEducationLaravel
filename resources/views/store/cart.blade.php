@extends('store.store')

@section('content')

	<style type="text/css" media="screen">
		.table{ margin-bottom:0px; }	
	</style>

    <section id='cart_items'>
    	<div class='container'>
    		<div class='table-responsive cart_info'>
    			<table class='table table-condensed'>
    				<thead>
    					<tr class='cart_menu'>
    						<td class='image'>Item</td>
    						<td class='image'></td>
    						<td class='image'>Preço</td>
    						<td class='image' style='text-align:center'>Quantidade</td>
    						<td class='image'>Total</td>
    						<td class='image'></td>
    					</tr>
    				</thead>
    				<tbody>
    					@forelse($cart->all() as $key => $item)
	    					<tr>
	    						<td class='cart_product'>
	    							<a href="{{ route('store.produto',['id'=>$key]) }}">
	    								Imagem
	    							</a>
	    						</td>
	    						<td class='cart_description'>
	    							<h4><a href="{{ route('store.produto',['id'=>$key]) }}">{{ $item['name'] }}</a></h4>
	    							<p>Código: {{ $key }}</p>
	    						</td>
	    						<td class='cart_price'>
	    							R$ {{ number_format($item['price'], 2, ',', '.') }}
	    						</td>
	    						<td class="cart_quantity" style='text-align:center'>
	    							<a href="{{ route('cart.removeUnid',['id'=>$key]) }}" class='btn'>-</a>
	    							{{ $item['qtd'] }}
	    							<a href="{{ route('cart.add',['id'=>$key]) }}" class='btn'>+</a>
	    						</td>
	    						<td class='cart_total'>
	    							<p class='cart_total_price'>R${{ number_format($item['price'] * $item['qtd'], 2, ',', '.') }}</p>
	    						</td>
	    						<td class='cart_delete'>
	    							<a href="{{ route('cart.destroy',['id'=>$key]) }}" class='cart_quantity_delete'>Delete</a>
	    						</td>
	    					</tr>
	    				@empty
	    					<tr>
	    						<td colspan='6'>
	    							<p>Nenhum item no carrinho.</p>
	    						</th>
	    					</tr>
    					@endforelse

    					<tr class='cart_menu'>
    						<td colspan="6">
    							<div class='pull-right'>
    								<span>
    									Total: R${{ number_format($cart->getTotal(), 2, ',', '.') }}
    								</span>

    								<a href="{{ route('checkout.place') }}" class='btn btn-success'>Fechar a conta</a>
    							</div>
    						</td>
    					</tr>
    				</tbody>
    			</table>
    		</div>
    	</div>
    </section>
@stop
