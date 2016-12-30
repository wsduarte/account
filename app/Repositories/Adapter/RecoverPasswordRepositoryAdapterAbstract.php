<?php

namespace App\Repositories\Adapter;

use App\Contracts\Entity\UserEntityForUseContractsTrait;
use App\Entity\UserEntityTrait;
use Respect\Validation\Validator as v;


abstract class RecoverPasswordRepositoryAdapterAbstract implements UserEntityForUseContractsTrait
{

    use UserEntityTrait;

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {

        if (!v::notEmpty()->validate($email)) {
            throw new \InvalidArgumentException(
                \Config::get('constants.PLEASE_EMAIL_EMPTY_RECOVER'), E_USER_WARNING
            );
        }

        if (!v::email()->notEmpty()->validate($email)) {
            throw new \InvalidArgumentException(
                \Config::get('constants.PLEASE_ENTER_EMAIL_VALID'), E_USER_WARNING
            );
        }
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    abstract public function recover(RecoverPasswordRepositoryAdapterAbstract $interface);

}
