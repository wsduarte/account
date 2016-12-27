<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use App\Exceptions\LogQueryException;
use App\User;
use App\Contracts\UserRegisterFacebookRepositoryInterface;
use App\Entity\UserOAuthFacebookEntityTrait;
use App\Repositories\Adapter\UserOAuthFacebookQueryFindByIdAdapterFixed;
use App\UserOAuthFacebook;

/**
 * Class UserRegisterFacebookRepository
 * @package App\Repositories
 */
class UserRegisterFacebookRepository implements UserRegisterFacebookRepositoryInterface
{

    use UserOAuthFacebookEntityTrait;

    protected $check;
    protected $auth;
    protected $user;

    public function __construct()
    {
        $this->check = new UserOAuthFacebookQueryFindByIdAdapterFixed();
        $this->auth = new UserOAuthFacebook();
        $this->user = new User();
    }

    /**
     * @param UserRegisterFacebookRepositoryInterface $interface
     * @return bool|mixed
     */
    public function register(UserRegisterFacebookRepositoryInterface $interface)
    {

        try {

            if (!$this->check->findByIdOAuth($interface->getAuthFacebook())) {

                $this->user->name = $interface->getAuthName();
                $this->user->registered_via_app = true;
                $this->user->registered_via_app_name = 'facebook';
                $this->user->save();

                $this->auth->user_id = $this->user->id;
                $this->auth->auth_facebook = $interface->getAuthFacebook();
                $this->auth->auth_picture = $interface->getAuthPicture();
                $this->auth->auth_email = $interface->getAuthEmail();
                $this->auth->auth_name = $interface->getAuthName();
                $this->auth->auth_url_facebook = $interface->getAuthUrlFacebook();
                $this->auth->save();

                if ($this->auth->save())
                    return $interface->getAuthFacebook();
                return false;

            } else {

                /** Atualiza cadastro **/
                $up = $this->auth->where('auth_facebook', $interface->getAuthFacebook())
                ->update([
                    'auth_picture' => $interface->getAuthPicture(),
                    'auth_email' => $interface->getAuthEmail(),
                    'auth_name' => $interface->getAuthName(),
                    'auth_url_facebook' => $interface->getAuthUrlFacebook()
                ]);

                if ($up)
                    return $interface->getAuthFacebook();
                return false;
            }

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
