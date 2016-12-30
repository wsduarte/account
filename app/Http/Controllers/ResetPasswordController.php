<?php

namespace App\Http\Controllers;

use App\Repositories\Adapter\ResetPasswordRepositoryAdapterAbstract;
use App\Repositories\ResetPasswordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new ResetPasswordRepository();
    }

    public function reset(Request $request)
    {

        try {

            if ($this->repository instanceof ResetPasswordRepositoryAdapterAbstract) {
                $this->repository->setToken($request->route('token'));
            }

        } catch (\Exception $e) {
            Session::put('message', $e->getMessage());
        }

        $array = [
            'title' => 'Redefinição de senha',
            'description' => 'Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.',
            'tokenSHA1' => $request->route('token'),
        ];

        return view('reset-password-user')->with($array);
    }

    public function getPostReset(Request $request)
    {

        try {

            if ($this->repository instanceof ResetPasswordRepositoryAdapterAbstract) {
                $this->repository->setToken($request->route('token'));
            }

            echo $request->input('token');




        } catch (\Exception $e) {

            echo $e->getMessage();

        }

    }

}
