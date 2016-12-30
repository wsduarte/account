<?php

namespace App\Contracts;


/**
 * Interface ResetPasswordRepositoryInterface
 * @package App\Contracts
 */
interface ResetPasswordRepositoryInterface
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