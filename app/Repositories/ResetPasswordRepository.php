<?php

namespace App\Repositories;

use App\Exceptions\LogQueryException;
use App\Repositories\Adapter\ResetPasswordRepositoryAdapterAbstract;
use App\User;
use App\UserRecoverPassword;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

/**
 * Class ResetPasswordRepository
 * @package App\Repositories
 */
class ResetPasswordRepository extends ResetPasswordRepositoryAdapterAbstract
{

    /**
     * @var UserRecoverPassword
     */
    protected $recover;
    /**
     * @var User
     */
    protected $user;


    public function __construct()
    {
        $this->recover = new UserRecoverPassword();
        $this->user = new User();

    }

    /**
     * Altera a Senha do usuário
     * @param ResetPasswordRepositoryAdapterAbstract $interface
     */
    public function reset(ResetPasswordRepositoryAdapterAbstract $interface)
    {

        try {

            if ($this->recover->where('token', $interface->getToken())->count() <= 0 ) {
                throw new \InvalidArgumentException(
                    sprintf(
                        \Config::get('constants.TOKEN_NOT_FOUND'),
                        route('recover')
                    ), E_USER_WARNING
                );
            }

            $result = $this->recover->where('token', $interface->getToken())->first();

            $up = $this->user->where('id', $result->user_id)
                ->update([
                    'password' => Hash::make($interface->getPassword())
                ]);

            return (bool)$up;

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
