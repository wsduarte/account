<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use App\Exceptions\LogQueryException;
use App\User;
use App\Contracts\RegisterTwitterRepositoryInterface;
use App\Entity\UserOAuthTwitterEntityTrait;
use App\Repositories\Adapter\OAuthTwitterQueryFindByIdAdapterFixed;
use App\UserOAuthTwitter;


/**
 * Class RegisterTwitterRepository
 * @package App\Repositories
 */
class RegisterTwitterRepository implements RegisterTwitterRepositoryInterface
{

    use UserOAuthTwitterEntityTrait;

    protected $check;
    protected $auth;
    protected $user;

    public function __construct()
    {
        $this->check = new OAuthTwitterQueryFindByIdAdapterFixed();
        $this->auth = new UserOAuthTwitter();
        $this->user = new User();
    }

    /**
     * @param RegisterTwitterRepositoryInterface $interface
     * @return bool|mixed
     */
    public function register(RegisterTwitterRepositoryInterface $interface)
    {
        try {

            if (!$this->check->findByIdOAuth($interface->getAuthTwitter())) {

                $this->user->name = $interface->getAuthName();
                $this->user->registered_via_app = true;
                $this->user->registered_via_app_name = 'twitter';
                $this->user->save();

                $this->auth->user_id = $this->user->id;
                $this->auth->auth_twitter = $interface->getAuthTwitter();
                $this->auth->auth_name = $interface->getAuthName();
                $this->auth->auth_picture = $interface->getAuthPicture();
                $this->auth->auth_biography = $interface->getAuthBiography();
                $this->auth->auth_location = $interface->getAuthLocation();
                $this->auth->auth_site = $interface->getAuthSite();
                $this->auth->auth_url_twitter = $interface->getAuthName();
                $this->auth->save();

                if ($this->auth->save())
                    return $interface->getAuthTwitter();
                return false;

            } else {

                /** Atualiza cadastro **/
                $up = $this->auth->where('auth_twitter', $interface->getAuthTwitter())
                    ->update([
                        'auth_name' => $interface->getAuthName(),
                        'auth_picture' => $interface->getAuthPicture(),
                        'auth_biography' => $interface->getAuthBiography(),
                        'auth_location' => $interface->getAuthLocation(),
                        'auth_site' => $interface->getAuthSite(),
                        'auth_url_twitter' =>$interface->getAuthName()
                    ]);

                if ($up)
                    return $interface->getAuthTwitter();
                return false;

            }

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
