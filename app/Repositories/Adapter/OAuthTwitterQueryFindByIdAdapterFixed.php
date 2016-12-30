<?php

namespace App\Repositories\Adapter;

use Illuminate\Database\QueryException;
use App\Exceptions\LogQueryException;
use App\UserOAuthTwitter;

class OAuthTwitterQueryFindByIdAdapterFixed extends OAuthQueryFindByIdApaterAbstract
{

    public function findByIdOAuth($id)
    {

        try {

            $twitter = new UserOAuthTwitter();

            if (is_string($id)) {
                if ($twitter->where('auth_twitter',$id)->count() > 0) {
                    return true;
                }
            }

            return false;

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
