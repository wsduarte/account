<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{

    public function index(Request $request)
    {
        $page = 'Fazer Login';
        $array = [
            'page' => $page
        ];



/*
        echo Session::get('id'); // gets age from session
        echo "<br >";
        echo Session::get('nome'); // gets age from session
        echo "<br >";
        echo $request->session()->get('nome'); // gets age from session
        echo "<br >";
        echo $request->session()->get('id'); // gets age from session
        echo "<br >";

        */


//        Session::put('nome');
//        echo '<br />';
//        echo Session::get('id');

        return view('login-user')->with($array);

    }


    /**
     * @param Request $request
     * @return array|string
     */
    public function authenticate(Request $request)
    {

        $page = 'Redirecionando você aguarde!!!';
        $url = 'http://app.vialoja.com.br/admin';
        $array = array(
            'page' => $page,
            'url' => $url
        );
        //https://laracasts.com/discuss/channels/general-discussion/laravel-5-referrer-url

        if ($request->input('_test') === true) {
            return $page;
        }

        return view('redirect-register')->with($array);

    }

}
