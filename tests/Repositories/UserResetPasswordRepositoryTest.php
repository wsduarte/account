<?php

use App\Repositories\UserResetPasswordRepository;
use App\Repositories\Adapter\UserResetPasswordRepositoryAdapterAbstract;

class UserResetPasswordRepositoryTest extends TestCase
{

    protected $test;
    protected $randon;

    /**
     * @test
     */
    public function setUp()
    {
        parent::setUp();
        $this->test = new UserResetPasswordRepository();
        $this->randon = str_random(10);
        $this->email = $this->randon . "@test.com";
    }

    /**
     * @depends setUp
     * @expectedException        InvalidArgumentException
     */
    public function testShouldRetrieveThrowsInvalidArgumentExceptionForSetToken()
    {

        if ($this->test instanceof UserResetPasswordRepositoryAdapterAbstract) {

            $this->test->setToken($this->randon);

        }

    }

    /**
     * @depends testShouldRetrieveThrowsInvalidArgumentExceptionForSetToken
     */
    public function testShouldRetrieveTokenForSetToken()
    {

        if ($this->test instanceof UserResetPasswordRepositoryAdapterAbstract) {

            $this->test->setToken(sha1($this->randon));
            $this->assertEquals(sha1($this->randon), $this->test->getToken());

        }

    }

    /**
     * @depends testShouldRetrieveTokenForSetToken
     */
    public function testShouldRetrievePasswordForSetPassword()
    {

        if ($this->test instanceof UserResetPasswordRepositoryAdapterAbstract) {

            $this->test->setPassword($this->randon);
            $this->assertEquals($this->randon, $this->test->getPassword());

        }

    }

    /**
     * @expectedException        InvalidArgumentException
     * @depends testShouldRetrievePasswordForSetPassword
     */
    public function testShouldRetrieveThrowsInvalidArgumentExceptionSetPasswordEquals()
    {

        if ($this->test instanceof UserResetPasswordRepositoryAdapterAbstract) {

            $this->test->setPassword($this->randon);
            $this->test->setPasswordEquals(time());
            $this->assertEquals($this->randon, $this->test->getPasswordEquals());

        }

    }

    /**
     * @depends testShouldRetrieveThrowsInvalidArgumentExceptionSetPasswordEquals
     */
    public function testShouldRetrieveEqualsPasswordForSetPasswordEquals()
    {

        if ($this->test instanceof UserResetPasswordRepositoryAdapterAbstract) {

            $this->test->setPassword($this->randon);
            $this->test->setPasswordEquals($this->randon);
            $this->assertEquals($this->randon, $this->test->getPasswordEquals());

        }

    }

    /**
     * @depends testShouldRetrieveEqualsPasswordForSetPasswordEquals
     */
    public function testShouldInsertIntoDataSendMailForMethodReset()
    {

        if ($this->test instanceof UserResetPasswordRepositoryAdapterAbstract) {

            $this->test->setToken(sha1($this->randon));
            $this->test->setPassword($this->randon);
            $this->test->setPasswordEquals($this->randon);
            $result = $this->test->reset($this->test);
            $this->assertEquals($this->randon, $result);

        }

    }

}
