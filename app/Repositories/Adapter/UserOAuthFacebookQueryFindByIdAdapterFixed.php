<?php

namespace App\Repositories\Adapter;

use Illuminate\Database\QueryException;
use App\Exceptions\LogQueryException;
use App\UserOAuthFacebook;

class UserOAuthFacebookQueryFindByIdAdapterFixed extends UserOAuthQueryFindByIdApaterAbstract
{

    public function findByIdOAuth($id)
    {

        try {

            $facebook = new UserOAuthFacebook();

            if (is_string($id)) {
                if ($facebook->where('auth_facebook',$id)->count() > 0) {
                    return true;
                }
            }

            return false;

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
