<?php

namespace App\Contracts;

use App\Contracts\Entity\UserOAuthTwitterEntityForUseContractsTrait;

/**
 * Interface AuthenticateTwitterRepositoryInterface
 * @package App\Contracts
 */
interface AuthenticateTwitterRepositoryInterface extends UserOAuthTwitterEntityForUseContractsTrait
{
    /**
     * @param RegisterTwitterRepositoryInterface $interface
     * @return mixed
     */

    public function authenticate(AuthenticateTwitterRepositoryInterface $interface);

}
