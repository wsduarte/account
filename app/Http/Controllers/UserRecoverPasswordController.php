<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserRecoverPasswordController extends Controller
{

    public function recover()
    {

        $page = 'Recuperar Senha';
        $array = [
            'page' => $page
        ];

        return view('recover-password-user')->with($array);
    }

}
