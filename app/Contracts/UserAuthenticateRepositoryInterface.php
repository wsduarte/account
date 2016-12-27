<?php

namespace App\Contracts;

use App\Contracts\Entity\UserEntityForUseContractsTrait;

/**
 * Interface UserAuthenticateRepositoryInterface
 * @package App\Contracts
 */
interface UserAuthenticateRepositoryInterface extends UserEntityForUseContractsTrait
{

    /**
     * @param UserAuthenticateRepositoryInterface $interface
     * @return mixed
     */
    public function autheticate(UserAuthenticateRepositoryInterface $interface);

}
