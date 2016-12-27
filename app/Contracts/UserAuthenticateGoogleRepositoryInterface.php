<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthGoogleEntityForUseContractsTrait;

/**
 * Interface UserAuthenticateGoogleRepositoryInterface
 * @package App\Contracts
 */
interface UserAuthenticateGoogleRepositoryInterface extends UserOAuthGoogleEntityForUseContractsTrait
{
    /**
     * @param UserAuthenticateGoogleRepositoryInterface $interface
     * @return mixed
     */
    public function authenticate(UserAuthenticateGoogleRepositoryInterface $interface);

}
