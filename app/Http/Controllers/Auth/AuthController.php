<?php

namespace CodeCommerce\Http\Controllers\Auth;

use CodeCommerce\User;
use Validator;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $redirectPath = '/';

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function estados()
    {
        return [ 
        ''  =>'Selecione',           'AC'=>'Acre',              'AL'=>'Alagoas',   'AP'=>'Amapá',
        'AM'=>'Amazonas',            'BA'=>'Bahia',             'CE'=>'Ceará',     'DF'=>'Distrito Federal',
        'ES'=>'Espírito Santo',      'GO'=>'Goiás',             'MA'=>'Maranhão',  'MT'=>'Mato Grosso',
        'MS'=>'Mato Grosso do Sul',  'MG'=>'Minas Gerais',      'PA'=>'Pará',      'PB'=>'Paraíba',
        'PR'=>'Parána',              'PE'=>'Pernambuco',        'PI'=>'Piauí',     'RJ'=>'Rio de Janeiro',
        'RN'=>'Rio Grande do Norte', 'RS'=>'Rio Grande do Sul', 'RO'=>'Rondônia',  'RR'=>'Roraima',
        'SC'=>'Santa Catarina',      'SE'=>'Sergipe',           'SP'=>'São Paulo', 'TO'=>'Tocantins'];
    }
}
