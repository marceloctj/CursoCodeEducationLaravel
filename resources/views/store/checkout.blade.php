@extends('store.store')

@section('categorias')
    @include('store.partial.categorias')
@stop

@section('content')
	<div class="container">

		@if (isset($cart) && $cart == 'empty')
			<h3>Carrinho de Compra Vazio</h3>
		@else
	 	<h3>Pedido realizado com sucesso!</h3>

	 	<p>O Pedido #{{ $order->id }}, foi realizado com sucesso.</p>
	 	@endif
	</div>
@stop