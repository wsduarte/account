<?php

namespace App\Http\Controllers;

use App\Contracts\AuthenticateRepositoryInterface;
use App\Repositories\AuthenticateRepository;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new AuthenticateRepository();
    }

    public function index()
    {
        $array = [
            'title' => 'Fazer Login',
            'description' => 'Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.',
        ];
        return view('login-user')->with($array);

    }

    /**
     * @param Request $request
     * @return array|string
     */
    public function getPostAuthenticate(LoginRequest $request)
    {

        try {

            if ($this->repository instanceof AuthenticateRepositoryInterface) {

                $this->repository->setEmail($request->input('email'))
                      ->setPassword($request->input('password'));
                $this->repository->autheticate($this->repository);

            }

            return redirect()->route('redirect.login');

        } catch (\Exception $e) {

            $request->session()->flash('message', $e->getMessage());
            return redirect()->route('login');

        }


//        $page = 'Redirecionando você aguarde!!!';
//        $url = 'http://app.vialoja.com.br/admin';
//        $array = array(
//            'page' => $page,
//            'url' => $url
//        );
//        //https://laracasts.com/discuss/channels/general-discussion/laravel-5-referrer-url
//
//        if ($request->input('_test') === true) {
//            return $page;
//        }
//
//        return view('redirect-register')->with($array);

    }

}
