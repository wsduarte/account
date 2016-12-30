<?php

use App\Repositories\RegisterTwitterRepository;

class RegisterTwitterRepositoryTest extends TestCase
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
        $this->test = new RegisterTwitterRepository();
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
     public function testShouldRetrieveIdAuthForSetAuthTwitter()
     {
         $this->test->setAuthTwitter($this->randon);
         $this->assertEquals($this->randon, $this->test->getAuthTwitter());
     }

    /**
     * @depends testShouldRetrieveIdAuthForSetAuthTwitter
     */
    public function testShouldRetrieveNameForSetAuthName()
    {
        $this->test->setAuthName($this->randon);
        $this->assertEquals($this->randon, $this->test->getAuthName());
    }

    /**
     * @depends testShouldRetrieveNameForSetAuthName
     */
    public function testShouldRetrieveImageForSetAuthPicture()
    {
        $this->test->setAuthPicture('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png');
        $this->assertEquals('https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_284x96dp.png', $this->test->getAuthPicture());
    }

    /**
     * @depends testShouldRetrieveImageForSetAuthPicture
     */
    public function testShouldRetrieveBiographyForSetAuthBiography()
    {
        $this->test->setAuthBiography($this->randon);
        $this->assertEquals($this->randon, $this->test->getAuthBiography());
    }

    /**
     * @depends testShouldRetrieveBiographyForSetAuthBiography
     */
    public function testShouldRetrieveLocationForSetAuthLocation()
    {
        $this->test->setAuthLocation($this->randon);
        $this->assertEquals($this->randon, $this->test->getAuthLocation());
    }

    /**
     * @depends testShouldRetrieveLocationForSetAuthLocation
     */
    public function testShouldRetrieveAuthSiteForSetAuthSite()
    {
        $this->test->setAuthSite($this->randon . 'mysite.com');
        $this->assertEquals($this->randon .'mysite.com', $this->test->getAuthSite());
    }

    /**
     * @depends testShouldRetrieveAuthSiteForSetAuthSite
     */
    public function testShouldRetrieveUrlForSetAuthUrlTwitter()
    {
        $this->test->setAuthUrlTwitter('https://www.facebook.com/');
        $this->assertEquals('https://www.facebook.com/', $this->test->getAuthUrlTwitter());
    }

    /**
     * @depends testShouldRetrieveUrlForSetAuthUrlTwitter
     */
    public function testShouldRetrieveIDUserTwitterInInsertForRegister()
    {
        $this->test->setAuthTwitter($this->randon);
        $this->test->setAuthName($this->randon);
        $result =$this->test->register($this->test);
        $this->assertEquals($this->randon,$result);

        //Teste Update
        // $this->test->setAuthTwitter($result);
        // $this->test->setAuthName($this->randon);
        // $this->assertEquals($result,$this->test->register($this->test));

    }

}
