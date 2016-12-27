<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthTwitterEntityForUseContractsTrait;

/**
 * Interface UserAuthenticateTwitterRepositoryInterface
 * @package App\Contracts
 */
interface UserAuthenticateTwitterRepositoryInterface extends UserOAuthTwitterEntityForUseContractsTrait
{
    /**
     * @param UserRegisterTwitterRepositoryInterface $interface
     * @return mixed
     */

    public function authenticate(UserAuthenticateTwitterRepositoryInterface $interface);

}
