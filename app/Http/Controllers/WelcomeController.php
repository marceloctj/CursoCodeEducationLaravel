<?php 

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Categoria;

class WelcomeController extends Controller {

	private $categorias;

	public function __construct(Categoria $categoria)
	{
		$this->middleware('guest');
		$this->categorias = $categoria;
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	public function teste(Categoria $categoria)
	{
		$categorias = $this->categorias->all();
		return view('exemplo', compact('categorias'));
	}

}
