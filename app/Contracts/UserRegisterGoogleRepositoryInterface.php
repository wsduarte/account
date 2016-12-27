<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthGoogleEntityForUseContractsTrait;

/**
 * Interface UserRegisterGoogleRepositoryInterface
 * @package App\Contracts
 */
interface UserRegisterGoogleRepositoryInterface extends UserOAuthGoogleEntityForUseContractsTrait
{
    /**
     * @param UserRegisterGoogleRepositoryInterface $interface
     * @return mixed
     */
    public function register(UserRegisterGoogleRepositoryInterface $interface);
}
