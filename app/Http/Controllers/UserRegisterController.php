<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRegisterController extends Controller
{
    public function register()
    {

        $array = [
            'title' => 'Criar conta gerenciar Loja Virtual',
            'description' => 'Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.',
        ];

        return view('register-user')->with($array);
    }

}
