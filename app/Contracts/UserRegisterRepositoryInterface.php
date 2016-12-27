<?php

namespace App\Contracts;

use App\Contracts\Entity\UserEntityForUseContractsTrait;

/**
 * Interface UserRegisterRepositoryInterface
 * @package App\Contracts
 */
interface UserRegisterRepositoryInterface extends UserEntityForUseContractsTrait
{

    /**
     * @return mixed
     */
    public function getPasswordEquals();

    /**
     * @param $password_equals
     * @return mixed
     */
    public function setPasswordEquals($password_equals);

}
