<?php

namespace App\Repositories;

use App\Repositories\Adapter\RegisterRepositoryAdapterAbstract;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Exceptions\LogQueryException;

/**
 * Class RegisterRepository
 * @package App\Repositories
 */
class RegisterRepository extends RegisterRepositoryAdapterAbstract
{

    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Registro de Usuário
     * @param RegisterRepositoryAdapterAbstract $interface
     * @return mixed
     */
    public function register(RegisterRepositoryAdapterAbstract $interface)
    {

        try {

            if ($this->user->where('email', $interface->getEmail())->count() > 0 ) {
                throw new \OverflowException(
                    sprintf(
                        \Config::get('constants.USER_IS_ALREADY_REGISTERED'),
                        route('login')
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
