<?php

namespace App\Repositories;

use App\Repositories\Adapter\UserLogLoginAllRepositoryAbstract;
use Respect\Validation\Validator as v;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use App\User;
use App\Contracts\AuthenticateRepositoryInterface;
use App\Entity\UserEntityTrait;
use App\Exceptions\LogQueryException;

/**
 * Class AuthenticateRepository
 * @package App\Repositories
 */
class AuthenticateRepository implements AuthenticateRepositoryInterface
{

    use UserEntityTrait;

    protected $user;
    protected $log;

    public function __construct()
    {
        $this->user = new User();
        $this->log = new UserLogLoginAllRepository();
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        if (!v::email()->notEmpty()->validate($email)) {
            throw new \InvalidArgumentException(
                \Config::get('constants.INVALID_EMAIL_OR_PASSWORD'), E_USER_WARNING
            );
        }
        $this->email = $email;
        return $this;
    }


    /**
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        if (!v::stringType()->notEmpty()->validate($password)) {
            throw new \InvalidArgumentException(
                \Config::get('constants.INVALID_EMAIL_OR_PASSWORD'), E_USER_WARNING
            );
        }
        $this->password = $password;
        return $this;
    }

    /**
     * Faz Autenticação de Usuário
     * @param AuthenticateRepositoryInterface $interface
     * @return array
     */
    public function autheticate(AuthenticateRepositoryInterface $interface)
    {

        try {

            if ($this->user->where('email', '=', $interface->getEmail())->count() <= 0) {

                if ($this->log instanceof UserLogLoginAllRepositoryAbstract) {
                    $this->log->setEmail($interface->getEmail())
                        ->setErrorEmail(true);
                    $this->log->register();
                }

                throw new \UnderflowException(
                    \Config::get('constants.INVALID_EMAIL_OR_PASSWORD'), E_USER_WARNING
                );
            }

            $data = \DB::table('users')
                ->leftJoin('users_shops', 'users.id', '=', 'users_shops.user_id')
                ->where('email', $interface->getEmail())
                ->select('users.*', 'users_shops.shop_id')
                ->get()
                ->first();

            if (Hash::check($data->password, $interface->getPassword()) !== false) {

                if ($this->log instanceof UserLogLoginAllRepositoryAbstract) {
                    $this->log->setEmail($interface->getEmail())
                        ->setUserId($data->id)
                        ->setErrorPassword(true);
                    $this->log->register();
                }

                throw new \InvalidArgumentException(
                    \Config::get('constants.INVALID_EMAIL_OR_PASSWORD'), E_USER_WARNING
                );

            }

            if ($this->log instanceof UserLogLoginAllRepositoryAbstract) {
                $this->log->setEmail($interface->getEmail())
                    ->setUserId($data->id);
                $this->log->register();
            }

            return $data;

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
