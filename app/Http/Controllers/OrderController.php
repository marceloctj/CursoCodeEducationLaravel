<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Order;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class OrderController extends Controller
{
	private $order;

	public function __construct(Order $order)
	{		
        $this->order = $order;
	}

    public function index()
    {        
        $orders = $this->order->orderBy('id', 'desc')->get(); 

		$textStatus = ($orders->count() > 0) ? $orders->first()->getStatusText() : '[]';

        return view('orders.index',compact('orders','textStatus'));
    }

    public function updateStatus(Request $request)
    {
    	if($request->isMethod('post')){

    		$order = $this->order->find($request->input('id'));

    		if($order->update($request->all())){
    			echo json_encode(array('status'=>true, 'titulo'=>$order->statusText));
    		}else{
    			echo json_encode(array('status'=>false));
    		}
    	}
    }
}
