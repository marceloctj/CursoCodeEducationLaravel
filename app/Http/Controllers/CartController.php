<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Support\Facades\Session;

use CodeCommerce\Model\Cart;
use CodeCommerce\Model\Produto;
use CodeCommerce\Http\Requests;

class CartController extends Controller
{
    
	private $cart;

    public function __construct(Cart $cart)
    {    	
    	$this->cart = $cart;
    }

    public function index()
    {   

    	if(!Session::has('cart')){
    		Session::set('cart', $this->cart);
    	}

    	return view('store.cart', ['cart'=>Session::get('cart')]);
    }
    public function add($id)
    {

    	$cart = $this->getCart();

    	$produto = Produto::find($id);
    	$cart->add($id, $produto->name, $produto->price);

    	Session::set('cart', $cart);

    	return redirect()->route('cart');
    }

    public function destroy($id)
    {
    	$cart = $this->getCart();

    	$cart->remove($id);

    	Session::set('cart', $cart);

    	return redirect()->route('cart');
    }

    public function removeUnid($id)
    {
    	$cart = $this->getCart();

    	$cart->removeUnid($id);

    	Session::set('cart', $cart);

    	return redirect()->route('cart');
    }

    public function getCart()
    {
    	return (Session::has('cart')) ? Session::get('cart') : $this->cart;
    }
}
