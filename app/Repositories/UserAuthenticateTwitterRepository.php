<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use App\Exceptions\LogQueryException;
use App\Contracts\UserAuthenticateTwitterRepositoryInterface;
use App\Entity\UserOAuthTwitterEntityTrait;
use App\Repositories\Adapter\UserOAuthTwitterQueryFindByIdAdapterFixed;
use App\UserOAuthTwitter;
use App\Repositories\Adapter\UserLogLoginAllRepositoryAbstract;

class UserAuthenticateTwitterRepository implements UserAuthenticateTwitterRepositoryInterface
{

    use UserOAuthTwitterEntityTrait;

    protected $check;
    protected $auth;
    protected $log;

    public function __construct()
    {
        $this->check = new UserOAuthTwitterQueryFindByIdAdapterFixed();
        $this->auth = new UserOAuthTwitter();
        $this->log = new UserLogLoginAllRepository;
    }

    /**
     * Faz Autenticação de Usuário
     * @param UserAuthenticateTwitterRepositoryInterface
     * @return array
     */
    public function authenticate(UserAuthenticateTwitterRepositoryInterface $interface)
    {

        try {

            if ($this->check->findByIdOAuth($interface->getAuthTwitter())) {

                $data = \DB::table('users')
                    ->leftJoin('users_shops', 'users.id', '=', 'users_shops.user_id')
                    ->leftJoin('users_oauth_twitter', 'users.id', '=', 'users_oauth_twitter.user_id')
                    ->where('users_oauth_twitter.auth_twitter', $interface->getAuthTwitter())
                    ->select('users.*', 'users_shops.shop_id')
                    ->get()
                    ->first();

                /** Atualiza cadastro **/
                $this->auth->where('auth_twitter', $interface->getAuthTwitter())
                ->update([
                    'auth_name' => $interface->getAuthName(),
                    'auth_picture' => $interface->getAuthPicture(),
                    'auth_biography' => $interface->getAuthBiography(),
                    'auth_location' => $interface->getAuthLocation(),
                    'auth_site' => $interface->getAuthSite(),
                    'auth_url_twitter' => $interface->getAuthName()
                ]);

                if ($this->log instanceof UserLogLoginAllRepositoryAbstract) {
                    $this->log->setOauthFacebook($interface->getAuthTwitter())
                        ->register();
                }

                return $data;

            } else {

                if ($this->log instanceof UserLogLoginAllRepositoryAbstract) {
                    $this->log->setOauthFacebook($interface->getAuthTwitter())
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
