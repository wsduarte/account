<?php

namespace App\Contracts\Entity;


/**
 * Interface UserRecoverPasswordEntityForUseContractsTrait
 * @package App\Contracts\Entity
 */
interface UserRecoverPasswordEntityForUseContractsTrait
{

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getUserId();

    /**
     * @param $user_id
     * @return mixed
     */
    public function setUserId($user_id);

    /**
     * @return mixed
     */
    public function getToken();

    /**
     * @param $token
     * @return mixed
     */
    public function setToken($token);

    /**
     * @return mixed
     */
    public function getEmail();


    /**
     * @param mixed $email
     * @return mixed
     */
    public function setEmail($email);

    /**
     * @return mixed
     */
    public function getStatus();

    /**
     * @param $status
     * @return mixed
     */
    public function setStatus($status);

}