<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use App\UserLogLoginAll;
use App\Exceptions\LogQueryException;
use App\Repositories\Adapter\UserLogLoginAllRepositoryAbstract;
use Request;

class UserLogLoginAllRepository extends UserLogLoginAllRepositoryAbstract
{

    public function register()
    {

        try {

            $log = new UserLogLoginAll();
            $log->user_id = $this->getUserId();
            $log->oauth_facebook = $this->getOauthFacebook();
            $log->oauth_google = $this->getOauthGoogle();
            $log->oauth_twitter = $this->getOauthTwitter();
            $log->email = $this->getEmail();
            $log->error_email = $this->getErrorEmail();
            $log->error_password = $this->getErrorPassword();
            $log->error_oauth = $this->getErrorOauth();
            $log->user_agent = Request::server('HTTP_USER_AGENT');
            $log->ip = Request::ip();
            $log->url_referer = Request::server('HTTP_REFERER');

            return $log->save();

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
