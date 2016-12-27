<?php

namespace App\Contracts\Entity;

/**
 * Interface UserEntityForUseContractsTrait
 * For UserEntityTrait
 * @package App\Contracts\Entity
 */
interface UserEntityForUseContractsTrait
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
    public function getGenderId();

    /**
     * @param $gender_id
     * @return mixed
     */
    public function setGenderId($gender_id);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getEmail();

    /**
     * @param $email
     * @return mixed
     */
    public function setEmail($email);

    /**
     * @return mixed
     */
    public function getPassword();

    /**
     * @param $password
     * @return mixed
     */
    public function setPassword($password);

    /**
     * @return mixed
     */
    public function getVerifiedEmail();

    /**
     * @param $verified_email
     * @return mixed
     */
    public function setVerifiedEmail($verified_email);

    /**
     * @return mixed
     */
    public function getRegisteredViaApp();

    /**
     * @param $registered_via_app
     * @return mixed
     */
    public function setRegisteredViaApp($registered_via_app);

    /**
     * @return mixed
     */
    public function getRegisteredViaAppName();

    /**
     * @param $registered_via_app_name
     * @return mixed
     */
    public function setRegisteredViaAppName($registered_via_app_name);

    /**
     * @return mixed
     */
    public function getRememberToken();

}
