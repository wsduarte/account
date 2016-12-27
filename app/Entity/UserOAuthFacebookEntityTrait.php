<?php

namespace App\Entity;

/**
 * Trait UserOAuthFacebookEntityTrait
 * @package App\Entity
 */
trait UserOAuthFacebookEntityTrait
{

    protected $id;
    protected $user_id;
    protected $auth_facebook;
    protected $auth_name;
    protected $auth_email;
    protected $auth_picture;
    protected $auth_url_facebook;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UserOAuthFacebookEntityTrait
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
     * @return UserOAuthFacebookEntityTrait
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthFacebook()
    {
        return $this->auth_facebook;
    }

    /**
     * @param mixed $auth_facebook
     * @return UserOAuthFacebookEntityTrait
     */
    public function setAuthFacebook($auth_facebook)
    {
        $this->auth_facebook = $auth_facebook;
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
     * @return UserOAuthFacebookEntityTrait
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
     * @return UserOAuthFacebookEntityTrait
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
     * @return UserOAuthFacebookEntityTrait
     */
    public function setAuthPicture($auth_picture)
    {
        $this->auth_picture = $auth_picture;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthUrlFacebook()
    {
        return $this->auth_url_facebook;
    }

    /**
     * @param mixed $auth_url_facebook
     * @return UserOAuthFacebookEntityTrait
     */
    public function setAuthUrlFacebook($auth_url_facebook)
    {
        $this->auth_url_facebook = $auth_url_facebook;
        return $this;
    }

}
