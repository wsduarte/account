<?php

namespace App\Repositories\Adapter;

use App\Contracts\Entity\UserEntityForUseContractsTrait;
use App\Entity\UserEntityTrait;
use App\Libs\Validate;
use Respect\Validation\Validator as v;


/**
 * Class ResetPasswordRepositoryAdapterAbstract
 * @package App\Repositories\Adapter
 */
abstract class ResetPasswordRepositoryAdapterAbstract implements UserEntityForUseContractsTrait
{

    use UserEntityTrait;

    /**
     * @var
     */
    protected $token;
    /**
     * @var
     */
    protected $password_equals;

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        if (!Validate::isSha1($this->token)) {

            throw new \InvalidArgumentException(
                \Config::get('constants.SHA1_INVALID'), E_USER_WARNING
            );

        }

        return $this;
    }

    /**
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {

        if (!Validate::isPasswd($password)) {
            throw new \InvalidArgumentException(
                \Config::get('constants.PASSWORD_IS_CURT'), E_USER_WARNING
            );
        }

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

        if (!Validate::isPasswd($password_equals)) {
            throw new \InvalidArgumentException(
                \Config::get('constants.PASSWORD_IS_CURT'), E_USER_WARNING
            );
        }

        $this->password_equals = $password_equals;
        if (!v::identical($this->password_equals)->validate($this->password)) {

            throw new \InvalidArgumentException(
                \Config::get('constants.ERROR_PASSWORD_IS_NOT_IDENTICAL'), E_USER_WARNING
            );

        }
        return $this;
    }

    /**
     * @return mixed
     */
    abstract public function reset(ResetPasswordRepositoryAdapterAbstract $interface);
}
