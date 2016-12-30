<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthGoogleEntityForUseContractsTrait;

/**
 * Interface AuthenticateGoogleRepositoryInterface
 * @package App\Contracts
 */
interface AuthenticateGoogleRepositoryInterface extends UserOAuthGoogleEntityForUseContractsTrait
{
    /**
     * @param AuthenticateGoogleRepositoryInterface $interface
     * @return mixed
     */
    public function authenticate(AuthenticateGoogleRepositoryInterface $interface);

}
