<?php

namespace App\Sessions\Subdomains\App\Account;

use Illuminate\Support\Facades\Session;

class UserSessions
{

    public static function create($data)
    {
        Session::put('id', $data['id']);
        Session::put('nome', $data['nome']);
    }

}
