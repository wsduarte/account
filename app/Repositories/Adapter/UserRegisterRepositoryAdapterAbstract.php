<?php

namespace App\Repositories\Adapter;

use App\Contracts\UserRegisterRepositoryInterface;
use App\Entity\UserEntityTrait;
use Respect\Validation\Validator as v;

abstract class UserRegisterRepositoryAdapterAbstract implements UserRegisterRepositoryInterface
{

    use UserEntityTrait;

    protected $password_equals;

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        if(!v::stringType()->notEmpty()->validate($name)) {
            throw new \InvalidArgumentException(
                \Config::get('constants.PLEASE_ENTER_NAME_VALID'), E_USER_WARNING
            );
        }
        $this->name = $name;
        return $this;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        if(!v::email()->notEmpty()->validate($email)) {
            throw new \InvalidArgumentException(
                \Config::get('constants.PLEASE_ENTER_EMAIL_VALID'), E_USER_WARNING
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
        if(!v::stringType()->notEmpty()->validate($password)) {
            throw new \InvalidArgumentException(
                \Config::get('constants.PLEASE_ENTER_PASSWORD_VALID'), E_USER_WARNING
            );
        }
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPasswordEquals()
    {
        return $this->password_equals;
    }

    /**
     * @param $password_equals
     * @return $this
     */
    public function setPasswordEquals($password_equals)
    {
        $this->password_equals = $password_equals;
        if (!v::identical($this->password_equals)->validate($this->password)) {

            throw new \InvalidArgumentException(
                \Config::get('constants.ERROR_PASSWORD_IS_NOT_IDENTICAL'), E_USER_WARNING
            );

        }
        return $this;
    }

    abstract public function register(UserRegisterRepositoryAdapterAbstract $interface);

}
