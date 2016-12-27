<?php
namespace App\Entity;

/**
 * Trait UserOAuthTwitterEntityTrait
 * @package App\Entity
 */
trait UserOAuthTwitterEntityTrait
{

    protected $id;
    protected $user_id;
    protected $auth_twitter;
    protected $auth_name;
    protected $auth_picture;
    protected $auth_biography;
    protected $auth_location;
    protected $auth_site;
    protected $auth_url_twitter;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UserOAuthTwitterEntityTrait
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
     * @return UserOAuthTwitterEntityTrait
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthTwitter()
    {
        return $this->auth_twitter;
    }

    /**
     * @param mixed $auth_twitter
     * @return UserOAuthTwitterEntityTrait
     */
    public function setAuthTwitter($auth_twitter)
    {
        $this->auth_twitter = $auth_twitter;
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
     * @return UserOAuthTwitterEntityTrait
     */
    public function setAuthName($auth_name)
    {
        $this->auth_name = $auth_name;
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
     * @return UserOAuthTwitterEntityTrait
     */
    public function setAuthPicture($auth_picture)
    {
        $this->auth_picture = $auth_picture;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthBiography()
    {
        return $this->auth_biography;
    }

    /**
     * @param mixed $auth_biography
     * @return UserOAuthTwitterEntityTrait
     */
    public function setAuthBiography($auth_biography)
    {
        $this->auth_biography = $auth_biography;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthLocation()
    {
        return $this->auth_location;
    }

    /**
     * @param mixed $auth_location
     * @return UserOAuthTwitterEntityTrait
     */
    public function setAuthLocation($auth_location)
    {
        $this->auth_location = $auth_location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthSite()
    {
        return $this->auth_site;
    }

    /**
     * @param mixed $auth_site
     * @return UserOAuthTwitterEntityTrait
     */
    public function setAuthSite($auth_site)
    {
        $this->auth_site = $auth_site;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthUrlTwitter()
    {
        return $this->auth_url_twitter;
    }

    /**
     * @param mixed $auth_url_twitter
     * @return UserOAuthTwitterEntityTrait
     */
    public function setAuthUrlTwitter($auth_url_twitter)
    {
        $this->auth_url_twitter = $auth_url_twitter;
        return $this;
    }

}
