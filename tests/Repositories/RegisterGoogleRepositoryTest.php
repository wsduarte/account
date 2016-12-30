<?php

use App\Repositories\RegisterGoogleRepository;

class RegisterGoogleRepositoryTest extends TestCase
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
        $this->test = new RegisterGoogleRepository();
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
     public function testShouldRetrieveIdAuthForSetAuthGoogle()
     {
         $this->test->setAuthGoogle($this->randon);
         $this->assertEquals($this->randon, $this->test->getAuthGoogle());
     }

    /**
     * @depends testShouldRetrieveIdAuthForSetAuthGoogle
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
    public function testShouldRetrieveUrlForSetAuthUrlGoogle()
    {
        $this->test->setAuthUrlGoogle('https://www.facebook.com/');
        $this->assertEquals('https://www.facebook.com/', $this->test->getAuthUrlGoogle());
    }

    /**
     * @depends testShouldRetrieveUrlForSetAuthUrlGoogle
     */
    public function testShouldRetrieveBooleanForSetAuthVerifiedEmail()
    {
        $this->test->setAuthVerifiedEmail(true);
        $this->assertEquals(true, $this->test->getAuthVerifiedEmail());
    }

    /**
     * @depends testShouldRetrieveBooleanForSetAuthVerifiedEmail
     */
    public function testShouldRetrieveIDUserGoogleInInsertForRegister()
    {

        if ($this->test instanceof RegisterGoogleRepository)

            $this->test->setAuthGoogle($this->randon);
            $this->test->setAuthName($this->randon);
            $this->test->setAuthEmail($this->email);
            $result =$this->test->register($this->test);
            $this->assertEquals($this->randon,$result);

            //Teste Update
            $this->test->setAuthGoogle($result);
            $this->test->setAuthName($this->randon);
            $this->test->setAuthEmail($this->email);
            $this->test->setAuthPicture($this->randon);
            $this->assertTrue($result ==$this->test->register($this->test));

    }

}
