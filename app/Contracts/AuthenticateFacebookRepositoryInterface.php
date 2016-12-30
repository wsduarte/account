<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthFacebookEntityForUseContractsTrait;

/**
 * Interface AuthenticateFacebookRepositoryInterface
 * @package App\Contracts
 */
interface AuthenticateFacebookRepositoryInterface extends UserOAuthFacebookEntityForUseContractsTrait
{
    /**
     * @param AuthenticateFacebookRepositoryInterface $interface
     * @return mixed
     */
    public function authenticate(AuthenticateFacebookRepositoryInterface $interface);
}
