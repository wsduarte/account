<?php

namespace App\Contracts\Entity;

/**
 * Interface UserOAuthGoogleEntityForUseContractsTrait
 * For Trait UserOAuthGoogleEntityTraity
 * @package App\Contracts\Entity
 */
interface UserOAuthGoogleEntityForUseContractsTrait
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
    public function getAuthGoogle();

    /**
     * @param $auth_google
     * @return mixed
     */
    public function setAuthGoogle($auth_google);

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
    public function getAuthUrlGoogle();

    /**
     * @param $auth_url_google
     * @return mixed
     */
    public function setAuthUrlGoogle($auth_url_google);

    /**
     * @return mixed
     */
    public function getAuthVerifiedEmail();

    /**
     * @param $auth_verified_email
     * @return mixed
     */
    public function setAuthVerifiedEmail($auth_verified_email);

}
