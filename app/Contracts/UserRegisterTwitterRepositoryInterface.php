<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthTwitterEntityForUseContractsTrait;

/**
 * Interface UserRegisterTwitterRepositoryInterface
 * @package App\Contracts
 */
interface UserRegisterTwitterRepositoryInterface extends UserOAuthTwitterEntityForUseContractsTrait
{
    /**
     * @param UserRegisterTwitterRepositoryInterface $interface
     * @return mixed
     */
    public function register(UserRegisterTwitterRepositoryInterface $interface);
}
