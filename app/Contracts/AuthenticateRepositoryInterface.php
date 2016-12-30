<?php

namespace App\Contracts;

use App\Contracts\Entity\UserEntityForUseContractsTrait;

/**
 * Interface AuthenticateRepositoryInterface
 * @package App\Contracts
 */
interface AuthenticateRepositoryInterface extends UserEntityForUseContractsTrait
{

    /**
     * @param AuthenticateRepositoryInterface $interface
     * @return mixed
     */
    public function autheticate(AuthenticateRepositoryInterface $interface);

}
