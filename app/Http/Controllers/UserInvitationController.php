<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserInvitationController extends Controller
{

    public function accept()
    {
        $page = 'Criar conta gerenciar Loja Virtual';
        $array = [
            'page' => $page
        ];

        return view('invitation-user')->with($array);
    }

    /**
     * Convite não aceito
     */
    public function refused()
    {

    }

}
