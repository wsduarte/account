<?php

namespace App\Contracts\Entity;

/**
 * Interface UserOAuthTwitterEntityForUseContractsTrait
 * For Trait UserOAuthTwitterEntityTrait
 * @package App\Contracts\Entity
 */
interface UserOAuthTwitterEntityForUseContractsTrait
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
    public function getAuthTwitter();

    /**
     * @param $auth_twitter
     * @return mixed
     */
    public function setAuthTwitter($auth_twitter);

    /**
     * @return mixed
     */
    public function getAuthName();

    /**
     * @param $auth_name
     * @return mixed
     */
    public function setAuthName($auth_name);

    /**
     * @return mixed
     */
    public function getAuthPicture();

    /**
     * @param $auth_picture
     * @return mixed
     */
    public function setAuthPicture($auth_picture);

    /**
     * @return mixed
     */
    public function getAuthBiography();

    /**
     * @param $auth_biography
     * @return mixed
     */
    public function setAuthBiography($auth_biography);

    /**
     * @return mixed
     */
    public function getAuthLocation();

    /**
     * @param $auth_location
     * @return mixed
     */
    public function setAuthLocation($auth_location);

    /**
     * @return mixed
     */
    public function getAuthSite();

    /**
     * @param $auth_site
     * @return mixed
     */
    public function setAuthSite($auth_site);

    /**
     * @return mixed
     */
    public function getAuthUrlTwitter();

    /**
     * @param $auth_url_twitter
     * @return mixed
     */
    public function setAuthUrlTwitter($auth_url_twitter);

}
