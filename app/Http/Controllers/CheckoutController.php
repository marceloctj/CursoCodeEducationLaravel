<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use CodeCommerce\Categoria;
use CodeCommerce\Events\CheckoutEvent;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class CheckoutController extends Controller
{

    private $order;
    private $orderItem;

    public function __construct(Order $order, OrderItem $orderItem){
        $this->order     = $order;
        $this->orderItem = $orderItem;
    }

    public function place()
    {       
        
        $cart = Session::get('cart');

        $categoriasSideBar = Categoria::all();

        if($cart->getTotal() > 0){

            $order = $this->order->create(['user_id'=>Auth::user()->id, 'total'=>$cart->getTotal()]);

            foreach ($cart->all() as $key => $item) {

            	$order->itens()->create(['produto_id'=>$key, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);

            }

            // $cart->clear();

            event(new CheckoutEvent(Auth::user(), $order));

            return view('store.checkout', compact('order','categoriasSideBar'));
        }

        
        $cart = 'empty';

        return view('store.checkout', compact('cart','categoriasSideBar'));
    }
}
