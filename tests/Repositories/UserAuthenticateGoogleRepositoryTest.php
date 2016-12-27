<?php

use App\Repositories\UserRegisterGoogleRepository;
use App\Contracts\UserRegisterGoogleRepositoryInterface;
use App\Repositories\UserAuthenticateGoogleRepository;
use App\Contracts\UserAuthenticateGoogleRepositoryInterface;

class UserAuthenticateGoogleRepositoryTest extends TestCase
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
        $this->test = new UserAuthenticateGoogleRepository();
        if($this->test instanceof UserAuthenticateGoogleRepositoryInterface) {
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
        if($this->test instanceof UserAuthenticateGoogleRepositoryInterface)
            $this->test->setId($this->randon);
            $this->assertEquals($this->randon, $this->test->getId());

    }

    /**
     * @depends testShouldRetrieveIdAuthForSetId
     */
    public function testShouldRetrieveIdForSetUserId()
    {
        if($this->test instanceof UserAuthenticateGoogleRepositoryInterface)
            $this->test->setUserId($this->randon);
            $this->assertEquals($this->randon, $this->test->getUserId());

    }

     /**
      * @depends testShouldRetrieveIdForSetUserId
      */
     public function testShouldRetrieveIdAuthForSetAuthGoogle()
     {

         if($this->test instanceof UserAuthenticateGoogleRepositoryInterface)
             $this->test->setAuthGoogle($this->randon);
             $this->assertEquals($this->randon, $this->test->getAuthGoogle());

     }

    /**
     * @depends testShouldRetrieveIdAuthForSetAuthGoogle
     */
    public function testShouldRetrieveNameForSetAuthName()
    {

        if($this->test instanceof UserAuthenticateGoogleRepositoryInterface)
            $this->test->setAuthName($this->randon);
            $this->assertEquals($this->randon, $this->test->getAuthName());

    }

    /**
     * @depends testShouldRetrieveNameForSetAuthName
     */
    public function testShouldRetrieveEmailForSetAuthEmail()
    {

        if($this->test instanceof UserAuthenticateGoogleRepositoryInterface)
            $this->test->setAuthEmail($this->email);
            $this->assertEquals($this->email, $this->test->getAuthEmail());

    }

    /**
     * @depends testShouldRetrieveEmailForSetAuthEmail
     */
    public function testShouldRetrieveImageForSetAuthPicture()
    {
        if($this->test instanceof UserAuthenticateGoogleRepositoryInterface)
            $this->test->setAuthPicture('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png');
            $this->assertEquals('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png', $this->test->getAuthPicture());

    }

    /**
     * @depends testShouldRetrieveImageForSetAuthPicture
     */
    public function testShouldRetrieveUrlForSetAuthUrlGoogle()
    {
        if($this->test instanceof UserAuthenticateGoogleRepositoryInterface)
            $this->test->setAuthUrlGoogle('https://www.facebook.com/');
            $this->assertEquals('https://www.facebook.com/', $this->test->getAuthUrlGoogle());
    }


    /**
     * @depends testShouldRetrieveUrlForSetAuthUrlGoogle
     * @expectedException        UnderflowException
     */
    public function testShouldExistsThrowsUnderflowExceptionForAuthenticate()
    {
        if($this->test instanceof UserAuthenticateGoogleRepositoryInterface)
            $this->test->setAuthGoogle($this->randon);
            $this->test->authenticate($this->test);

    }

    /**
     * @depends testShouldExistsThrowsUnderflowExceptionForAuthenticate
     */
    public function testShouldRegisterAndAuthenticateUser()
    {

        $register = new UserRegisterGoogleRepository();

        if ($register instanceof UserRegisterGoogleRepositoryInterface)

            $register->setAuthGoogle($this->randon);
            $register->setAuthName($this->randon);
            $register->setAuthEmail($this->email);
            $result = $register->register($register);
            $this->assertEquals($this->randon,$result);

        if($this->test instanceof UserAuthenticateGoogleRepositoryInterface)

            $this->test->setAuthGoogle($this->randon);
            $this->test->setAuthName($this->randon);
            $this->test->setAuthEmail($this->email);
            $result = $this->test->authenticate($this->test);
            $this->assertEquals ($this->randon,$result->name);

    }

}
