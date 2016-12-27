<?php

namespace App\Contracts\Entity;

/**
 * Interface UserOAuthFacebookEntityForUseContractsTrait
 * For Trait UserOAuthFacebookEntityTrait
 * @package App\Contracts\Entity
 */
interface UserOAuthFacebookEntityForUseContractsTrait
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
    public function getAuthFacebook();

    /**
     * @param $auth_facebook
     * @return mixed
     */
    public function setAuthFacebook($auth_facebook);

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
    public function getAuthEmail();

    /**
     * @param $auth_email
     * @return mixed
     */
    public function setAuthEmail($auth_email);

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
    public function getAuthUrlFacebook();

    /**
     * @param $auth_url_facebook
     * @return mixed
     */
    public function setAuthUrlFacebook($auth_url_facebook);

}
