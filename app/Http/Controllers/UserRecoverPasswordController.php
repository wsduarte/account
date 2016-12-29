<?php

namespace App\Http\Controllers;

use App\Repositories\Adapter\UserRecoverPasswordRepositoryAdapterAbstract;
use App\Repositories\UserRecoverPasswordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserRecoverPasswordController extends Controller
{

    public function recover()
    {
        $array = [
            'title' => 'Recuperar Senha',
            'description' => 'Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.',
        ];

        return view('recover-password-user')->with($array);
    }

    public function getPostRecover(Request $request)
    {
        try {

            $recover = new UserRecoverPasswordRepository();

            if ($recover instanceof UserRecoverPasswordRepositoryAdapterAbstract) {
                $recover->setEmail($request->input('email'));
                $recover->recover($recover);
                return redirect()->route('recover.notice');
            }

        } catch (\Exception $e) {

            Session::put('message', $e->getMessage());
            Session::put('recover_email', $request->input('email'));
            return redirect()->route('recover');

        }

    }

    public function notice()
    {
        $array = [
            'title' => 'Recuperação da senha solicitada',
            'description' => 'Para finalizar a recuperação da senha você deve seguir os passos que estão no email recebido.',
        ];
        return view('recover-notice')->with($array);
    }

}
