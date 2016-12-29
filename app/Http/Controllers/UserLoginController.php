<?php

namespace App\Http\Controllers;

use App\Contracts\UserAuthenticateRepositoryInterface;
use App\Repositories\UserAuthenticateRepository;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{

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
    public function getPostAuthenticate(Request $request)
    {

        try {

            $login = new UserAuthenticateRepository();
            if ($login instanceof UserAuthenticateRepositoryInterface) {

                $login->setEmail($request->input('email'))
                      ->setPassword($request->input('password'));
                $login->autheticate($login);

            }

            return redirect()->route('/admin');

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
