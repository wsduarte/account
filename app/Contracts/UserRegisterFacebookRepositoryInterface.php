<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthFacebookEntityForUseContractsTrait;

/**
 * Interface UserRegisterFacebookRepositoryInterface
 * @package App\Contracts
 */
interface UserRegisterFacebookRepositoryInterface extends UserOAuthFacebookEntityForUseContractsTrait
{
    /**
     * @param UserRegisterFacebookRepositoryInterface $interface
     * @return mixed
     */
    public function register(UserRegisterFacebookRepositoryInterface $interface);
}
