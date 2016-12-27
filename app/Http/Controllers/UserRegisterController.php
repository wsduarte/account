<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRegisterController extends Controller
{
    public function register()
    {
        $page = 'Criar conta gerenciar Loja Virtual';
        $array = [
            'page' => $page
        ];

        return view('register-user')->with($array);
    }

}
