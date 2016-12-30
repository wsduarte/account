<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use App\Exceptions\LogQueryException;
use App\Contracts\RegisterGoogleRepositoryInterface;
use App\Entity\UserOAuthGoogleEntityTrait;
use App\Repositories\Adapter\OAuthGoogleQueryFindByIdAdapterFixed;
use App\UserOAuthGoogle;
use App\User;

/**
 * Class RegisterGoogleRepository
 * @package App\Repositories
 */
class RegisterGoogleRepository implements RegisterGoogleRepositoryInterface
{

    use UserOAuthGoogleEntityTrait;

    protected $check;
    protected $auth;
    protected $user;

    public function __construct()
    {
        $this->check = new OAuthGoogleQueryFindByIdAdapterFixed();
        $this->auth = new UserOAuthGoogle();
        $this->user = new User();
    }

    /**
     * @param RegisterGoogleRepositoryInterface $interface
     * @return bool|mixed
     */
    public function register(RegisterGoogleRepositoryInterface $interface)
    {
        try {

            if (!$this->check->findByIdOAuth($interface->getAuthGoogle())) {

                $this->user->name = $interface->getAuthName();
                $this->user->registered_via_app = true;
                $this->user->registered_via_app_name = 'google';
                $this->user->save();

                $this->auth->user_id = $this->user->id;
                $this->auth->auth_google = $interface->getAuthGoogle();
                $this->auth->auth_name = $interface->getAuthName();
                $this->auth->auth_email = $interface->getAuthEmail();
                $this->auth->auth_picture = $interface->getAuthPicture();
                $this->auth->auth_url_google = $interface->getAuthUrlGoogle();
                $this->auth->auth_verified_email = $interface->getAuthVerifiedEmail();

                if ($this->auth->save())
                    return $interface->getAuthGoogle();
                return false;

            } else {

                /** Atualiza cadastro **/
                $up = $this->auth->where('auth_google', $interface->getAuthGoogle())
                ->update([
                    'auth_name' => $interface->getAuthName(),
                    'auth_email' => $interface->getAuthEmail(),
                    'auth_picture' => $interface->getAuthPicture()
                ]);

                if ($up)
                    return $interface->getAuthGoogle();
                return false;

            }

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
