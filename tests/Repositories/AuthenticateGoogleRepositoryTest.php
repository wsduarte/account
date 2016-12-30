<?php

use App\Repositories\RegisterGoogleRepository;
use App\Contracts\RegisterGoogleRepositoryInterface;
use App\Repositories\AuthenticateGoogleRepository;
use App\Contracts\AuthenticateGoogleRepositoryInterface;

class AuthenticateGoogleRepositoryTest extends TestCase
{

    protected $test;
    protected $randon;
    protected $email;

    /**
     * @test
     */
    public function setUp()
    {
        parent::setUp();
        $this->test = new AuthenticateGoogleRepository();
        if($this->test instanceof AuthenticateGoogleRepositoryInterface) {
            $this->assertTrue(method_exists($this->test, 'authenticate'), 'Method was not corret: register');
        }

        $this->randon = str_random(10);
        $this->email = str_random(10) .'@test.com';

    }

    /**
     * @depends setUp
     */
    public function testShouldRetrieveIdAuthForSetId()
    {
        if($this->test instanceof AuthenticateGoogleRepositoryInterface)
            $this->test->setId($this->randon);
            $this->assertEquals($this->randon, $this->test->getId());

    }

    /**
     * @depends testShouldRetrieveIdAuthForSetId
     */
    public function testShouldRetrieveIdForSetUserId()
    {
        if($this->test instanceof AuthenticateGoogleRepositoryInterface)
            $this->test->setUserId($this->randon);
            $this->assertEquals($this->randon, $this->test->getUserId());

    }

     /**
      * @depends testShouldRetrieveIdForSetUserId
      */
     public function testShouldRetrieveIdAuthForSetAuthGoogle()
     {

         if($this->test instanceof AuthenticateGoogleRepositoryInterface)
             $this->test->setAuthGoogle($this->randon);
             $this->assertEquals($this->randon, $this->test->getAuthGoogle());

     }

    /**
     * @depends testShouldRetrieveIdAuthForSetAuthGoogle
     */
    public function testShouldRetrieveNameForSetAuthName()
    {

        if($this->test instanceof AuthenticateGoogleRepositoryInterface)
            $this->test->setAuthName($this->randon);
            $this->assertEquals($this->randon, $this->test->getAuthName());

    }

    /**
     * @depends testShouldRetrieveNameForSetAuthName
     */
    public function testShouldRetrieveEmailForSetAuthEmail()
    {

        if($this->test instanceof AuthenticateGoogleRepositoryInterface)
            $this->test->setAuthEmail($this->email);
            $this->assertEquals($this->email, $this->test->getAuthEmail());

    }

    /**
     * @depends testShouldRetrieveEmailForSetAuthEmail
     */
    public function testShouldRetrieveImageForSetAuthPicture()
    {
        if($this->test instanceof AuthenticateGoogleRepositoryInterface)
            $this->test->setAuthPicture('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png');
            $this->assertEquals('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png', $this->test->getAuthPicture());

    }

    /**
     * @depends testShouldRetrieveImageForSetAuthPicture
     */
    public function testShouldRetrieveUrlForSetAuthUrlGoogle()
    {
        if($this->test instanceof AuthenticateGoogleRepositoryInterface)
            $this->test->setAuthUrlGoogle('https://www.facebook.com/');
            $this->assertEquals('https://www.facebook.com/', $this->test->getAuthUrlGoogle());
    }


    /**
     * @depends testShouldRetrieveUrlForSetAuthUrlGoogle
     * @expectedException        UnderflowException
     */
    public function testShouldExistsThrowsUnderflowExceptionForAuthenticate()
    {
        if($this->test instanceof AuthenticateGoogleRepositoryInterface)
            $this->test->setAuthGoogle($this->randon);
            $this->test->authenticate($this->test);

    }

    /**
     * @depends testShouldExistsThrowsUnderflowExceptionForAuthenticate
     */
    public function testShouldRegisterAndAuthenticateUser()
    {

        $register = new RegisterGoogleRepository();

        if ($register instanceof RegisterGoogleRepositoryInterface)

            $register->setAuthGoogle($this->randon);
            $register->setAuthName($this->randon);
            $register->setAuthEmail($this->email);
            $result = $register->register($register);
            $this->assertEquals($this->randon,$result);

        if($this->test instanceof AuthenticateGoogleRepositoryInterface)

            $this->test->setAuthGoogle($this->randon);
            $this->test->setAuthName($this->randon);
            $this->test->setAuthEmail($this->email);
            $result = $this->test->authenticate($this->test);
            $this->assertEquals ($this->randon,$result->name);

    }

}
