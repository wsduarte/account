<?php

namespace App\Repositories;

use App\Repositories\Adapter\UserResetPasswordRepositoryAdapterAbstract;

class UserResetPasswordRepository extends UserResetPasswordRepositoryAdapterAbstract
{

    public function reset(UserResetPasswordRepositoryAdapterAbstract $interface)
    {
        return $interface->getPassword();
    }

}
