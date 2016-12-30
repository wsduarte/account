<?php

namespace App\Http\Controllers;

use App\Repositories\Adapter\RecoverPasswordRepositoryAdapterAbstract;
use App\Repositories\UserRecoverPasswordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecoverPasswordController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new UserRecoverPasswordRepository();
    }

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

            if ($this->repository instanceof RecoverPasswordRepositoryAdapterAbstract) {
                $this->repository->setEmail($request->input('email'));
                $this->repository->recover($this->repository);
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
