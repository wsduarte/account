<?php

namespace App\Http\Controllers;

use App\Repositories\Adapter\UserRecoverPasswordRepositoryAdapterAbstract;
use App\Repositories\UserRecoverPasswordRepository;
use Illuminate\Http\Request;

class UserRecoverPasswordController extends Controller
{

    public function recover()
    {

        $array = [
            'page' => 'Recuperar Senha'
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

            echo $e->getMessage();

        }

    }

    public function notice()
    {
        # code...
    }

}
