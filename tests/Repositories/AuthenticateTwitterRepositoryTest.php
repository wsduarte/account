<?php

use App\Repositories\RegisterTwitterRepository;
use App\Contracts\RegisterTwitterRepositoryInterface;
use App\Repositories\AuthenticateTwitterRepository;
use App\Contracts\AuthenticateTwitterRepositoryInterface;

class AuthenticateTwitterRepositoryTest extends TestCase
{

    protected $test;
    protected $randon;

    /**
     * @test
     */
    public function setUp()
    {
        parent::setUp();
        $this->test = new AuthenticateTwitterRepository();
        if($this->test instanceof AuthenticateTwitterRepositoryInterface) {
            $this->assertTrue(method_exists($this->test, 'authenticate'), 'Method was not corret: register');
        }
        $this->randon = str_random(10);

    }

    /**
     * @depends setUp
     */
    public function testShouldRetrieveIdAuthForSetId()
    {
        if($this->test instanceof AuthenticateTwitterRepositoryInterface)
            $this->test->setId($this->randon);
            $this->assertEquals($this->randon, $this->test->getId());

    }

    /**
     * @depends testShouldRetrieveIdAuthForSetId
     */
    public function testShouldRetrieveIdForSetUserId()
    {

        if($this->test instanceof AuthenticateTwitterRepositoryInterface)
            $this->test->setUserId($this->randon);
            $this->assertEquals($this->randon, $this->test->getUserId());

    }

     /**
      * @depends testShouldRetrieveIdForSetUserId
      */
     public function testShouldRetrieveIdAuthForSetAuthTwitter()
     {

         if($this->test instanceof AuthenticateTwitterRepositoryInterface)
             $this->test->setAuthTwitter($this->randon);
             $this->assertEquals($this->randon, $this->test->getAuthTwitter());

     }

    /**
     * @depends testShouldRetrieveIdAuthForSetAuthTwitter
     */
    public function testShouldRetrieveNameForSetAuthName()
    {

        if($this->test instanceof AuthenticateTwitterRepositoryInterface)
            $this->test->setAuthName($this->randon);
            $this->assertEquals($this->randon, $this->test->getAuthName());

    }

    /**
     * @depends testShouldRetrieveNameForSetAuthName
     */
    public function testShouldRetrieveImageForSetAuthPicture()
    {
        if($this->test instanceof AuthenticateTwitterRepositoryInterface)
            $this->test->setAuthPicture('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png');
            $this->assertEquals('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png', $this->test->getAuthPicture());

    }

    /**
     * @depends testShouldRetrieveImageForSetAuthPicture
     */
    public function testShouldRetrieveUrlForSetAuthUrlTwitter()
    {
        if($this->test instanceof AuthenticateTwitterRepositoryInterface)
            $this->test->setAuthUrlTwitter('https://www.facebook.com/');
            $this->assertEquals('https://www.facebook.com/', $this->test->getAuthUrlTwitter());
    }


    /**
     * @depends testShouldRetrieveUrlForSetAuthUrlTwitter
     * @expectedException        UnderflowException
     */
    public function testShouldExistsThrowsUnderflowExceptionForAuthenticate()
    {
        if($this->test instanceof AuthenticateTwitterRepositoryInterface)
            $this->test->setAuthTwitter($this->randon);
            $this->test->authenticate($this->test);

    }

    /**
     * @depends testShouldExistsThrowsUnderflowExceptionForAuthenticate
     */
    public function testShouldRegisterAndAuthenticateUser()
    {

        $register = new RegisterTwitterRepository();

        if ($register instanceof RegisterTwitterRepositoryInterface)

            $register->setAuthTwitter($this->randon);
            $register->setAuthName($this->randon);
            $result = $register->register($register);
            $this->assertEquals($this->randon,$result);

        if($this->test instanceof AuthenticateTwitterRepositoryInterface)

            $this->test->setAuthTwitter($this->randon);
            $this->test->setAuthName($this->randon);
            $result = $this->test->authenticate($this->test);
            $this->assertInternalType('object', $result);
            $this->assertEquals($this->randon,$result->name);

    }

}
