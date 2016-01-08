<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use CodeCommerce\Categoria;
use CodeCommerce\Events\CheckoutEvent;

use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

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

    public function place(CheckoutService $checkoutService)
    {       
        $cart = (Session::has('cart')) ? Session::get('cart') : [];

        $categoriasSideBar = Categoria::all();

        if($cart->getTotal() > 0){

            $checkout = $checkoutService->createCheckoutBuilder();

            $order = $this->order->create(['user_id'=>Auth::user()->id, 'total'=>$cart->getTotal()]);

            foreach ($cart->all() as $key => $item) {

                $checkout->addItem(new Item($key, $item['name'], number_format($item['price'], 2, '.',''), $item['qtd']));

            	$order->itens()->create(['produto_id'=>$key, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);

            }

            $cart->clear();

            event(new CheckoutEvent(Auth::user(), $order));

            $referencia = $order->getPagSeguroReferencia();

            $checkout->setReference($referencia);

            $response = $checkoutService->checkout($checkout->getCheckout());        

            $order->update(['pag_seguro_referencia'=>$referencia]);

            return redirect($response->getRedirectionUrl());
        }

        
        $cart = 'empty';

        return view('store.checkout', compact('cart','categoriasSideBar'));
    }    

    public function setStatusProducts(Locator $service)
    {
        try {
            if($this->request->hasPost('notificationType')){

                if($this->request->getPost('notificationType') == 'transaction'){
                    $notification = $this->request->getPost('notificationCode');

                    $transaction = $service->getByNotification($notification);

                    $detalhes = $transaction->getDetails();

                    $order = $this->order->where("pag_seguro_referencia", $transaction->getDetails()->getReference())->limit(1)->get()->first();

                    if($order){
                        $order->update([
                            'status'                => $detalhes->getStatus(),
                            'pag_seguro_transacao'  => $detalhes->getCode()
                        ]);
                    }
                }
            }
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
