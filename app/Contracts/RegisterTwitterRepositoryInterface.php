<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthTwitterEntityForUseContractsTrait;

/**
 * Interface RegisterTwitterRepositoryInterface
 * @package App\Contracts
 */
interface RegisterTwitterRepositoryInterface extends UserOAuthTwitterEntityForUseContractsTrait
{
    /**
     * @param RegisterTwitterRepositoryInterface $interface
     * @return mixed
     */
    public function register(RegisterTwitterRepositoryInterface $interface);
}
