<?php

namespace App\Contracts\Entity;

/**
 * Interface UserLogLoginAllInterface
 * @package App\Contracts\Entity
 */
/**
 * Interface UserLogLoginAllEntityForUseContractsTrait
 * @package App\Contracts\Entity
 */
interface UserLogLoginAllEntityForUseContractsTrait
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
    public function getOauthFacebook();

    /**
     * @param $oauth_facebook
     * @return mixed
     */
    public function setOauthFacebook($oauth_facebook);

    /**
     * @return mixed
     */
    public function getOauthGoogle();

    /**
     * @param $oauth_google
     * @return mixed
     */
    public function setOauthGoogle($oauth_google);

    /**
     * @return mixed
     */
    public function getOauthTwitter();

    /**
     * @param $oauth_twitter
     * @return mixed
     */
    public function setOauthTwitter($oauth_twitter);

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
    public function getErrorEmail();

    /**
     * @param $error_email
     * @return mixed
     */
    public function setErrorEmail($error_email);

    /**
     * @return mixed
     */
    public function getErrorPassword();

    /**
     * @param $error_password
     * @return mixed
     */
    public function setErrorPassword($error_password);

    /**
     * @return mixed
     */
    public function getErrorOauth();

    /**
     * @param $error_oauth
     * @return mixed
     */
    public function setErrorOauth($error_oauth);

    /**
     * @return mixed
     */
    public function getUserAgent();

    /**
     * @param $user_agent
     * @return mixed
     */
    public function setUserAgent($user_agent);

    /**
     * @return mixed
     */
    public function getIp();

    /**
     * @param $ip
     * @return mixed
     */
    public function setIp($ip);

    /**
     * @return mixed
     */
    public function getUrlReferer();

    /**
     * @param $url_referer
     * @return mixed
     */
    public function setUrlReferer($url_referer);


}
