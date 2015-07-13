<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItem)
    {   
    	if(!Session::has('cart') || empty(Session::get('cart')->all())){
            return redirect()->route('cart');
        }

        $cart = Session::get('cart');

        if($cart->getTotal() > 0){

            $order = $orderModel->create(['user_id'=>Auth::user()->id, 'total'=>$cart->getTotal()]);

            foreach ($cart->all() as $key => $item) {

            	$order->itens()->create(['produto_id'=>$key, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);

            }

            return view('store.checkout');
        }
    }
}
