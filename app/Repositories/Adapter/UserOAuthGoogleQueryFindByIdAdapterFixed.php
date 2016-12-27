<?php

namespace App\Repositories\Adapter;

use Illuminate\Database\QueryException;
use App\Exceptions\LogQueryException;
use App\UserOAuthGoogle;

class UserOAuthGoogleQueryFindByIdAdapterFixed extends UserOAuthQueryFindByIdApaterAbstract
{

    public function findByIdOAuth($id)
    {

        try {

            $google = new UserOAuthGoogle();

            if (is_string($id)) {
                if ($google->where('auth_google',$id)->count() > 0) {
                    return true;
                }
            }

            return false;

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
