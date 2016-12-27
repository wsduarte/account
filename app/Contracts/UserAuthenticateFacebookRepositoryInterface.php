<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthFacebookEntityForUseContractsTrait;

/**
 * Interface UserAuthenticateFacebookRepositoryInterface
 * @package App\Contracts
 */
interface UserAuthenticateFacebookRepositoryInterface extends UserOAuthFacebookEntityForUseContractsTrait
{
    /**
     * @param UserAuthenticateFacebookRepositoryInterface $interface
     * @return mixed
     */
    public function authenticate(UserAuthenticateFacebookRepositoryInterface $interface);
}
