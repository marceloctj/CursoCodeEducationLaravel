<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class TesteController extends Controller
{
    
    public function getLogin()
    {        
        
        $data = [
            'email'=>'marceloctj@gmail.com',
            'password'=>123456
        ];

        // if(Auth::attempt($data)){
        //     return 'logou';
        // }

        // if(Auth::check()){
        //     return 'logado';
        // }

        return Auth::user();
        return 'falhou';

    }  

    public function getLogout()
    {
        Auth::logout();

        if(Auth::check()){
            return 'logado';
        }

        return 'Não logado';
    }

}
