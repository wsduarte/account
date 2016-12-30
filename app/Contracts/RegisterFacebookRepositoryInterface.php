<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthFacebookEntityForUseContractsTrait;

/**
 * Interface RegisterFacebookRepositoryInterface
 * @package App\Contracts
 */
interface RegisterFacebookRepositoryInterface extends UserOAuthFacebookEntityForUseContractsTrait
{
    /**
     * @param RegisterFacebookRepositoryInterface $interface
     * @return mixed
     */
    public function register(RegisterFacebookRepositoryInterface $interface);
}
