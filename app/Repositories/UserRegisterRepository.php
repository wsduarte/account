<?php

namespace App\Repositories;

use App\Repositories\Adapter\UserRegisterRepositoryAdapterAbstract;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Exceptions\LogQueryException;

/**
 * Class UserRegisterRepository
 * @package App\Repositories
 */
class UserRegisterRepository extends UserRegisterRepositoryAdapterAbstract
{

    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Registro de Usuário
     * @param UserRegisterRepositoryAdapterAbstract $interface
     * @return mixed
     */
    public function register(UserRegisterRepositoryAdapterAbstract $interface)
    {

        try {

            if ($this->user->where('email', $interface->getEmail())->count() > 0 ) {
                throw new \OverflowException(
                    sprintf(
                        \Config::get('constants.USER_IS_ALREADY_REGISTERED'),
                        url('//login')
                    ), E_USER_WARNING
                );
            }

            $this->user->name = $interface->getName();
            $this->user->email = $interface->getEmail();
            $this->user->password = Hash::make($interface->getPassword());
            $this->user->save();

            return $this->user->id;

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
