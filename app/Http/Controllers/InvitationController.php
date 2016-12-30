<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InvitationController extends Controller
{

    public function accept()
    {

        $array = [
            'title' => 'Criar conta gerenciar Loja Virtual',
            'description' => 'Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.',
        ];

        return view('invitation-user')->with($array);
        return redirect()->route('/login');
    }

    /**
     * Convite não aceito
     */
    public function refused()
    {
        return redirect()->route('/login');
    }

}
