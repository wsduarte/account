<?php

namespace App\Repositories\Adapter;

use App\Contracts\UserLogLoginAllRepositoryAbstractInterface;
use App\Entity\UserLogLoginAllEntityTrait;

/**
 * Class UserLogLoginAllRepositoryAbstract
 * @package App\Repositories
 */
abstract class UserLogLoginAllRepositoryAbstract implements UserLogLoginAllRepositoryAbstractInterface
{

    use UserLogLoginAllEntityTrait;

    /**
     * @return mixed
     */
    abstract public function register();

}
