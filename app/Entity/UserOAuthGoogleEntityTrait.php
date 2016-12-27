<?php

namespace App\Entity;

/**
 * Trait UserOAuthGoogleEntityTrait
 * @package App\Entity
 */
trait UserOAuthGoogleEntityTrait
{

    protected $id;
    protected $user_id;
    protected $auth_google;
    protected $auth_name;
    protected $auth_email;
    protected $auth_picture;
    protected $auth_url_google;
    protected $auth_verified_email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UserOAuthGoogleEntityTrait
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     * @return UserOAuthGoogleEntityTrait
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthGoogle()
    {
        return $this->auth_google;
    }

    /**
     * @param mixed $auth_google
     * @return UserOAuthGoogleEntityTrait
     */
    public function setAuthGoogle($auth_google)
    {
        $this->auth_google = $auth_google;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthName()
    {
        return $this->auth_name;
    }

    /**
     * @param mixed $auth_name
     * @return UserOAuthGoogleEntityTrait
     */
    public function setAuthName($auth_name)
    {
        $this->auth_name = $auth_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthEmail()
    {
        return $this->auth_email;
    }

    /**
     * @param mixed $auth_email
     * @return UserOAuthGoogleEntityTrait
     */
    public function setAuthEmail($auth_email)
    {
        $this->auth_email = $auth_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthPicture()
    {
        return $this->auth_picture;
    }

    /**
     * @param mixed $auth_picture
     * @return UserOAuthGoogleEntityTrait
     */
    public function setAuthPicture($auth_picture)
    {
        $this->auth_picture = $auth_picture;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthUrlGoogle()
    {
        return $this->auth_url_google;
    }

    /**
     * @param mixed $auth_url_google
     * @return UserOAuthGoogleEntityTrait
     */
    public function setAuthUrlGoogle($auth_url_google)
    {
        $this->auth_url_google = $auth_url_google;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthVerifiedEmail()
    {
        return $this->auth_verified_email;
    }

    /**
     * @param mixed $auth_verified_email
     * @return UserOAuthGoogleEntityTrait
     */
    public function setAuthVerifiedEmail($auth_verified_email)
    {
        $this->auth_verified_email = $auth_verified_email;
        return $this;
    }

}
