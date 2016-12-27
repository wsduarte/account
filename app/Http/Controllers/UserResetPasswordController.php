<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserResetPasswordController extends Controller
{

    public function reset()
    {
        $page = 'Redefinição de senha';
        $array = [
            'page' => $page
        ];

        return view('reset-password-user')->with($array);
    }
    
}
