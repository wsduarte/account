<?php

use App\Repositories\UserRecoverPasswordRepository;
use App\Repositories\Adapter\UserRecoverPasswordRepositoryAdapterAbstract;

class UserRecoverPasswordRepositoryTest extends TestCase
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
        $this->test = new UserRecoverPasswordRepository();
        $this->randon = str_random(10);
        $this->email = $this->randon . "@test.com";
    }

    /**
     * @depends setUp
     */
    public function testShouldRetrieveIDForSetId()
    {

        if ($this->test instanceof UserRecoverPasswordRepositoryAdapterAbstract) {

            $id = time();
            $this->test->setId($id);
            $this->assertEquals($id, $this->test->getId());

        }

    }

    /**
     * @depends testShouldRetrieveIDForSetId
     */
    public function testShouldRetrieveEmailForSetEmail()
    {

        if ($this->test instanceof UserRecoverPasswordRepositoryAdapterAbstract) {

            $this->test->setEmail($this->email);
            $this->assertEquals($this->email, $this->test->getEmail());

        }

    }


    /**
     * @depends testShouldRetrieveEmailForSetEmail
     * @expectedException        UnderflowException
     */
    public function testShouldExistsThrowsInvalidArgumentExceptionForSetPassword()
    {

        if ($this->test instanceof UserRecoverPasswordRepositoryAdapterAbstract) {

            $this->test->setEmail($this->email);
            $this->test->recover($this->test);

        }

    }

    /**
     * @depends testShouldExistsThrowsInvalidArgumentExceptionForSetPassword
     */
    public function testShouldInsertIntoEmailForMethodRecoverAndReturnBoolean()
    {

        if ($this->test instanceof UserRecoverPasswordRepositoryAdapterAbstract) {


            $register = new \App\Repositories\UserRegisterRepository();

            $id = $register->setName($this->randon)
                ->setEmail($this->email)
                ->setPassword($this->randon)
                ->register($register);
            $this->assertTrue(is_numeric($id) ? True : False);

            $this->test->setEmail($this->email);
            $result = $this->test->recover($this->test);
            $this->assertTrue($result);

        }

    }

}
