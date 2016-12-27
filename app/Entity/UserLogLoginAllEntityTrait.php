<?php

namespace App\Entity;

/**
 * Class UserLogLoginAllEntityTrait
 * @package App\Entity
 */
trait UserLogLoginAllEntityTrait
{

    protected $id;
    protected $user_id;
    protected $oauth_facebook;
    protected $oauth_google;
    protected $oauth_twitter;
    protected $email;
    protected $error_email;
    protected $error_password;
    protected $error_oauth;
    protected $user_agent;
    protected $ip;
    protected $url_referer;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UserLogLoginAllEntityTrait
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
     * @return UserLogLoginAllEntityTrait
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOauthFacebook()
    {
        return $this->oauth_facebook;
    }

    /**
     * @param mixed $oauth_facebook
     * @return UserLogLoginAllEntityTrait
     */
    public function setOauthFacebook($oauth_facebook)
    {
        $this->oauth_facebook = $oauth_facebook;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOauthGoogle()
    {
        return $this->oauth_google;
    }

    /**
     * @param mixed $oauth_google
     * @return UserLogLoginAllEntityTrait
     */
    public function setOauthGoogle($oauth_google)
    {
        $this->oauth_google = $oauth_google;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOauthTwitter()
    {
        return $this->oauth_twitter;
    }

    /**
     * @param mixed $oauth_twitter
     * @return UserLogLoginAllEntityTrait
     */
    public function setOauthTwitter($oauth_twitter)
    {
        $this->oauth_twitter = $oauth_twitter;
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
     * @return UserLogLoginAllEntityTrait
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorEmail()
    {
        return $this->error_email;
    }

    /**
     * @param mixed $error_email
     * @return UserLogLoginAllEntityTrait
     */
    public function setErrorEmail($error_email)
    {
        $this->error_email = $error_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorPassword()
    {
        return $this->error_password;
    }

    /**
     * @param mixed $error_password
     * @return UserLogLoginAllEntityTrait
     */
    public function setErrorPassword($error_password)
    {
        $this->error_password = $error_password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorOauth()
    {
        return $this->error_oauth;
    }

    /**
     * @param mixed $error_oauth
     * @return UserLogLoginAllEntityTrait
     */
    public function setErrorOauth($error_oauth)
    {
        $this->error_oauth = $error_oauth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * @param mixed $user_agent
     * @return UserLogLoginAllEntityTrait
     */
    public function setUserAgent($user_agent)
    {
        $this->user_agent = $user_agent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     * @return UserLogLoginAllEntityTrait
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrlReferer()
    {
        return $this->url_referer;
    }

    /**
     * @param mixed $url_referer
     * @return UserLogLoginAllEntityTrait
     */
    public function setUrlReferer($url_referer)
    {
        $this->url_referer = $url_referer;
        return $this;
    }

}
