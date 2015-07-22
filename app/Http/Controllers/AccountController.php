<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AccountController extends Controller
{
	private $user; 
    
	public function __construct()
	{
		$this->user = Auth::user();        
	}

    public function index()
    {
    	
    }

    public function orders()
    {
    	$orders = $this->user->orders;

    	return view('store.orders', compact('orders'));
    }
}
