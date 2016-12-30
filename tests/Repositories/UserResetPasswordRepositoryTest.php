<?php

use App\Repositories\Adapter\UserRecoverPasswordRepositoryAdapterAbstract;
use App\Repositories\RegisterRepository;
use App\Repositories\ResetPasswordRepository;
use App\Repositories\Adapter\ResetPasswordRepositoryAdapterAbstract;

class ResetPasswordRepositoryTest extends TestCase
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
        $this->test = new ResetPasswordRepository();
        $this->randon = str_random(10);
        $this->email = $this->randon . "@test.com";
    }

    /**
     * @depends setUp
     * @expectedException        InvalidArgumentException
     */
    public function testShouldRetrieveThrowsInvalidArgumentExceptionForSetToken()
    {

        if ($this->test instanceof ResetPasswordRepositoryAdapterAbstract) {

            $this->test->setToken($this->randon);

        }

    }

    /**
     * @depends testShouldRetrieveThrowsInvalidArgumentExceptionForSetToken
     */
    public function testShouldRetrieveTokenForSetToken()
    {

        if ($this->test instanceof ResetPasswordRepositoryAdapterAbstract) {

            $this->test->setToken(sha1($this->randon));
            $this->assertEquals(sha1($this->randon), $this->test->getToken());

        }

    }

    /**
     * @depends testShouldRetrieveTokenForSetToken
     */
    public function testShouldRetrievePasswordForSetPassword()
    {

        if ($this->test instanceof ResetPasswordRepositoryAdapterAbstract) {

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

        if ($this->test instanceof ResetPasswordRepositoryAdapterAbstract) {

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

        if ($this->test instanceof ResetPasswordRepositoryAdapterAbstract) {

            $this->test->setPassword($this->randon);
            $this->test->setPasswordEquals($this->randon);
            $this->assertEquals($this->randon, $this->test->getPasswordEquals());

        }

    }

    /**
     * @expectedException        InvalidArgumentException
     * @depends testShouldRetrieveThrowsInvalidArgumentExceptionSetPasswordEquals
     */
    public function testShouldRetrieveThrowsInvalidArgumentExceptionToReset()
    {

        if ($this->test instanceof ResetPasswordRepositoryAdapterAbstract) {

            $this->test->setToken(sha1($this->randon))
                ->setPassword($this->randon)
                ->setPasswordEquals($this->randon);
            $this->test->reset($this->test);

        }

    }

    /**
     * @depends testShouldRetrieveThrowsInvalidArgumentExceptionToReset
     */
    public function testShouldInsertNewPasswordForMethodReset()
    {

        $register = new \App\Repositories\RegisterRepository();
        $id = $register->setName($this->randon)
            ->setEmail($this->email)
            ->setPassword($this->randon)
            ->register($register);
        $this->assertTrue(is_numeric($id) ? True : False);

        $recover = new \App\Repositories\UserRecoverPasswordRepository();

        if ($recover instanceof UserRecoverPasswordRepositoryAdapterAbstract) {

            $recover->setEmail($this->email);
            $token = $recover->recover($recover);

        }

        if ($this->test instanceof ResetPasswordRepositoryAdapterAbstract) {

            $this->test->setToken($token);
            $result = $this->test->reset($this->test);
            $this->assertTrue(true, $result);

        }

    }

}
