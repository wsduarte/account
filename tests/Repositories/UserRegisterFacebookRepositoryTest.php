<?php

use App\Repositories\UserRegisterFacebookRepository;

class UserRegisterFacebookRepositoryTest extends TestCase
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
        $this->test = new UserRegisterFacebookRepository();
        $this->randon = str_random(10);
        $this->email = str_random(10) .'@test.com';
    }

    /**
     * @depends setUp
     */
    public function testShouldRetrieveIdAuthForSetId()
    {
        $this->test->setId($this->randon);
        $this->assertEquals($this->randon, $this->test->getId());
    }

    /**
     * @depends testShouldRetrieveIdAuthForSetId
     */
    public function testShouldRetrieveIdForSetUserId()
    {
        $this->test->setUserId($this->randon);
        $this->assertEquals($this->randon, $this->test->getUserId());
    }

     /**
      * @depends testShouldRetrieveIdForSetUserId
      */
     public function testShouldRetrieveIdAuthForSetAuthFacebook()
     {
         $this->test->setAuthFacebook($this->randon);
         $this->assertEquals($this->randon, $this->test->getAuthFacebook());
     }

    /**
     * @depends testShouldRetrieveIdAuthForSetAuthFacebook
     */
    public function testShouldRetrieveNameForSetAuthName()
    {
        $this->test->setAuthName($this->randon);
        $this->assertEquals($this->randon, $this->test->getAuthName());
    }

    /**
     * @depends testShouldRetrieveNameForSetAuthName
     */
    public function testShouldRetrieveEmailForSetAuthEmail()
    {
        $this->test->setAuthEmail($this->email);
        $this->assertEquals($this->email, $this->test->getAuthEmail());
    }

    /**
     * @depends testShouldRetrieveEmailForSetAuthEmail
     */
    public function testShouldRetrieveImageForSetAuthPicture()
    {
        $this->test->setAuthPicture('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png');
        $this->assertEquals('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png', $this->test->getAuthPicture());
    }

    /**
     * @depends testShouldRetrieveImageForSetAuthPicture
     */
    public function testShouldRetrieveUrlForSetAuthUrlFacebook()
    {
        $this->test->setAuthUrlFacebook('https://www.facebook.com/');
        $this->assertEquals('https://www.facebook.com/', $this->test->getAuthUrlFacebook());
    }

    /**
     * @depends testShouldRetrieveUrlForSetAuthUrlFacebook
     */
    public function testShouldRetrieveIDUserFacebookInInsertForRegister()
    {

        $this->test->setAuthFacebook($this->randon);
        $this->test->setAuthName($this->randon);
        $this->test->setAuthEmail($this->email);
        $result = $this->test->register($this->test);
        $this->assertEquals($this->randon,$result);

        //Teste Update
        $this->test->setAuthFacebook($result);
        $this->test->setAuthName($this->randon);
        $this->test->setAuthEmail($this->email);
        $this->test->setAuthPicture($this->randon);
        $this->assertTrue($result == $this->test->register($this->test));

    }


}
