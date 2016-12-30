<?php

namespace App\Sessions;

use Illuminate\Support\Facades\Session;

class Sessions
{

    public static function create($data)
    {
        Session::put('id', $data['id']);
        Session::put('nome', $data['nome']);
    }

    public function FunctionName($value='')
    {



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
    }

}
