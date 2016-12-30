<?php

namespace App\Http\Controllers;

use App\Repositories\RegisterRepository;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new RegisterRepository();
    }


    public function register()
    {

        $array = [
            'title' => 'Criar conta gerenciar Loja Virtual',
            'description' => 'Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.',
        ];

        return view('register-user')->with($array);
    }

    public function getPostRegister(RegisterRequest $request)
    {
        try {


        } catch (\Exception $e) {

            Session::put('message', $e->getMessage());
            Session::put('recover_email', $request->input('email'));
            return redirect()->route('recover');

        }

    }

}
