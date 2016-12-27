<?php

namespace App\Entity;

/**
 * Trait UserEntityTrait
 * @package App\Entity
 */
trait UserEntityTrait
{

    protected $id;
    protected $gender_id;
    protected $name;
    protected $email;
    protected $password;
    protected $verified_email;
    protected $registered_via_app;
    protected $registered_via_app_name;
    protected $remember_token;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UserEntityTrait
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenderId()
    {
        return $this->gender_id;
    }

    /**
     * @param mixed $gender_id
     * @return UserEntityTrait
     */
    public function setGenderId($gender_id)
    {
        $this->gender_id = $gender_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return UserEntityTrait
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return UserEntityTrait
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return UserEntityTrait
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerifiedEmail()
    {
        return $this->verified_email;
    }

    /**
     * @param mixed $verified_email
     * @return UserEntityTrait
     */
    public function setVerifiedEmail($verified_email)
    {
        $this->verified_email = $verified_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegisteredViaApp()
    {
        return $this->registered_via_app;
    }

    /**
     * @param mixed $registered_via_app
     * @return UserEntityTrait
     */
    public function setRegisteredViaApp($registered_via_app)
    {
        $this->registered_via_app = $registered_via_app;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegisteredViaAppName()
    {
        return $this->registered_via_app_name;
    }

    /**
     * @param mixed $registered_via_app_name
     * @return UserEntityTrait
     */
    public function setRegisteredViaAppName($registered_via_app_name)
    {
        $this->registered_via_app_name = $registered_via_app_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * @param mixed $remember_token
     * @return UserEntityTrait
     */
    public function setRememberToken($remember_token)
    {
        $this->remember_token = $remember_token;
        return $this;
    }

}
