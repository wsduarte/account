<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use App\Exceptions\LogQueryException;
use App\Contracts\AuthenticateGoogleRepositoryInterface;
use App\Entity\UserOAuthGoogleEntityTrait;
use App\Repositories\Adapter\OAuthGoogleQueryFindByIdAdapterFixed;
use App\UserOAuthGoogle;
use App\Repositories\Adapter\UserLogLoginAllRepositoryAbstract;

class AuthenticateGoogleRepository implements AuthenticateGoogleRepositoryInterface
{

    use UserOAuthGoogleEntityTrait;

    protected $check;
    protected $auth;
    protected $log;

    public function __construct()
    {
        $this->check = new OAuthGoogleQueryFindByIdAdapterFixed();
        $this->auth = new UserOAuthGoogle();
        $this->log = new UserLogLoginAllRepository;
    }

    /**
     * Faz Autenticação de Usuário
     * @param AuthenticateGoogleRepositoryInterface
     * @return array
     */
    public function authenticate(AuthenticateGoogleRepositoryInterface $interface)
    {

        try {

            if ($this->check->findByIdOAuth($interface->getAuthGoogle())) {

                $data = \DB::table('users')
                    ->leftJoin('users_shops', 'users.id', '=', 'users_shops.user_id')
                    ->leftJoin('users_oauth_google', 'users.id', '=', 'users_oauth_google.user_id')
                    ->where('users_oauth_google.auth_google', $interface->getAuthGoogle())
                    ->select('users.*', 'users_shops.shop_id')
                    ->get()
                    ->first();

                /** Atualiza cadastro **/

                $this->auth->where('auth_google', $interface->getAuthGoogle())
                ->update([
                    'auth_picture' => $interface->getAuthPicture(),
                    'auth_email' => $interface->getAuthEmail(),
                    'auth_name' => $interface->getAuthName(),
                    'auth_url_google' => $interface->getAuthUrlGoogle()
                ]);

                if ($this->log instanceof UserLogLoginAllRepositoryAbstract) {
                    $this->log->setOauthGoogle($interface->getAuthUrlGoogle())
                        ->register();
                }

                return $data;

            } else {

                if ($this->log instanceof UserLogLoginAllRepositoryAbstract) {
                    $this->log->setOauthGoogle($interface->getAuthUrlGoogle())
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
