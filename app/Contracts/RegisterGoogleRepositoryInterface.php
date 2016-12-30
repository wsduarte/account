<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthGoogleEntityForUseContractsTrait;

/**
 * Interface RegisterGoogleRepositoryInterface
 * @package App\Contracts
 */
interface RegisterGoogleRepositoryInterface extends UserOAuthGoogleEntityForUseContractsTrait
{
    /**
     * @param RegisterGoogleRepositoryInterface $interface
     * @return mixed
     */
    public function register(RegisterGoogleRepositoryInterface $interface);
}
