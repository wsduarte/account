<?php

namespace App\Http\Controllers;

use App\Repositories\Adapter\UserResetPasswordRepositoryAdapterAbstract;
use App\Repositories\UserResetPasswordRepository;
use Illuminate\Http\Request;

class UserResetPasswordController extends Controller
{

    protected $reset;

    public function __construct()
    {
        $this->reset = new UserResetPasswordRepository();
    }

    public function reset(Request $request)
    {

        try {

            if ($this->reset instanceof UserResetPasswordRepositoryAdapterAbstract) {
                $this->reset->setToken($request->route('token'));
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $page = 'Redefinição de senha';
        $array = [
            'page' => $page,
            'tokenSHA1' => $request->route('token')
        ];

        return view('reset-password-user')->with($array);
    }

    public function getPostReset(Request $request)
    {

        try {

            if ($this->reset instanceof UserResetPasswordRepositoryAdapterAbstract) {
                $this->reset->setToken($request->route('token'));
            }

            echo $request->input('token');


        } catch (\Exception $e) {

            echo $e->getMessage();

        }

    }

}
