<?php

namespace App\Contracts;

use App\Contracts\Entity\UserEntityForUseContractsTrait;

/**
 * Interface RegisterRepositoryInterface
 * @package App\Contracts
 */
interface RegisterRepositoryInterface extends UserEntityForUseContractsTrait
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
