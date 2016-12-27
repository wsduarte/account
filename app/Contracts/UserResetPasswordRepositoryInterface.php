<?php

namespace App\Contracts;


/**
 * Interface UserResetPasswordRepositoryInterface
 * @package App\Contracts
 */
interface UserResetPasswordRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getPasswordEquals();

    /**
     * @param $password_equals
     * @return mixed
     */
    public function setPasswordEquals($password_equals);

    /**
     * @return mixed
     */
    public function getToken();

    /**
     * @param $token
     * @return mixed
     */
    public function setToken($token);


}