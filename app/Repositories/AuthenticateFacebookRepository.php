<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use App\Exceptions\LogQueryException;
use App\Contracts\AuthenticateFacebookRepositoryInterface;
use App\Entity\UserOAuthFacebookEntityTrait;
use App\Repositories\Adapter\UserOAuthFacebookQueryFindByIdAdapterFixed;
use App\UserOAuthFacebook;
use App\Repositories\Adapter\UserLogLoginAllRepositoryAbstract;

class AuthenticateFacebookRepository implements AuthenticateFacebookRepositoryInterface
{

    use UserOAuthFacebookEntityTrait;

    protected $check;
    protected $auth;
    protected $log;

    public function __construct()
    {
        $this->check = new UserOAuthFacebookQueryFindByIdAdapterFixed();
        $this->auth = new UserOAuthFacebook();
        $this->log = new UserLogLoginAllRepository;
    }

    /**
     * Faz Autenticação de Usuário
     * @param AuthenticateFacebookRepositoryInterface
     * @return array
     */
    public function authenticate(AuthenticateFacebookRepositoryInterface $interface)
    {

        try {

            if ($this->check->findByIdOAuth($interface->getAuthFacebook())) {

                $data = \DB::table('users')
                    ->leftJoin('users_shops', 'users.id', '=', 'users_shops.user_id')
                    ->leftJoin('users_oauth_facebook', 'users.id', '=', 'users_oauth_facebook.user_id')
                    ->where('users_oauth_facebook.auth_facebook', $interface->getAuthFacebook())
                    ->select('users.*', 'users_shops.shop_id')
                    ->get()
                    ->first();

                /** Atualiza cadastro **/

                $this->auth->where('auth_facebook', $interface->getAuthFacebook())
                ->update([
                    'auth_picture' => $interface->getAuthPicture(),
                    'auth_email' => $interface->getAuthEmail(),
                    'auth_name' => $interface->getAuthName(),
                    'auth_url_facebook' => $interface->getAuthUrlFacebook()
                ]);

                if ($this->log instanceof UserLogLoginAllRepositoryAbstract) {
                    $this->log->setOauthFacebook($interface->getAuthFacebook())
                        ->register();
                }

                return $data;

            } else {

                if ($this->log instanceof UserLogLoginAllRepositoryAbstract) {
                    $this->log->setOauthFacebook($interface->getAuthFacebook())
                        ->setErrorOauth(true)
                        ->register();
                }

                throw new \UnderflowException(
                    \Config::get('constants.APP_IS_NOT_ASSOCIATED'), E_USER_WARNING
                );

            }

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
