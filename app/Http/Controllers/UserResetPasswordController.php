<?php

namespace App\Http\Controllers;

use App\Repositories\Adapter\UserResetPasswordRepositoryAdapterAbstract;
use App\Repositories\UserResetPasswordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserResetPasswordController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new UserResetPasswordRepository();
    }

    public function reset(Request $request)
    {

        try {

            if ($this->repository instanceof UserResetPasswordRepositoryAdapterAbstract) {
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

            if ($this->repository instanceof UserResetPasswordRepositoryAdapterAbstract) {
                $this->repository->setToken($request->route('token'));
            }

            echo $request->input('token');


        } catch (\Exception $e) {

            echo $e->getMessage();

        }

    }

}
