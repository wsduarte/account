<?php

use App\Repositories\UserRegisterRepository;
use App\Repositories\Adapter\UserRegisterRepositoryAdapterAbstract;

class UserRegisterRepositoryTest extends TestCase
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
        $this->test = new UserRegisterRepository();

        if($this->test instanceof UserRegisterRepositoryAdapterAbstract) {
            $this->assertTrue(method_exists($this->test, 'getName'), 'Method was not corret: getName');
            $this->assertTrue(method_exists($this->test, 'setName'), 'Method was not corret: setName');
            $this->assertTrue(method_exists($this->test, 'getEmail'), 'Method was not corret: getEmail');
            $this->assertTrue(method_exists($this->test, 'setEmail'), 'Method was not corret: setEmail');
            $this->assertTrue(method_exists($this->test, 'getPassword'), 'Method was not corret: getPassword');
            $this->assertTrue(method_exists($this->test, 'setPassword'), 'Method was not corret: setPassword');
            $this->assertTrue(method_exists($this->test, 'register'), 'Method was not corret: register');
        }

        $this->randon = str_random(10);
        $this->email = str_random(10) .'@depends.com';

    }

    /**
     * @depends setUp
     * @expectedException        InvalidArgumentException
     */
    public function testShouldExistsThrowsInvalidArgumentExceptionForSetName()
    {
        $this->test->setName(null);
    }

    /**
     * @depends testShouldExistsThrowsInvalidArgumentExceptionForSetName
     */
    public function testShouldRetrieveNameValidForSetName()
    {
        $this->test->setName($this->randon);
        $this->assertEquals($this->randon,$this->test->getName(), 'Name was not corret');
    }

    /**
     * @depends testShouldRetrieveNameValidForSetName
     * @expectedException        InvalidArgumentException
     */
    public function testShouldExistsThrowsInvalidArgumentExceptionForSetEmail()
    {
        $this->test->setEmail($this->randon);
    }

    /**
     * @depends testShouldExistsThrowsInvalidArgumentExceptionForSetEmail
     */
    public function testShouldRetrieveEmailValidForSetMail()
    {
        $this->test->setEmail($this->email);
        $this->assertEquals($this->email,$this->test->getEmail(), 'Email was not corret');
    }

    /**
     * @depends testShouldRetrieveEmailValidForSetMail
     * @expectedException        InvalidArgumentException
     */
    public function testShouldExistsThrowsInvalidArgumentExceptionForSetPassword()
    {
        $this->test->setPassword(null);
    }

    /**
     * @depends testShouldExistsThrowsInvalidArgumentExceptionForSetPassword
     */
    public function testShouldRetrievePasswordValidForSetPassaword()
    {
        $this->test->setPassword($this->randon);
        $this->assertEquals($this->randon,$this->test->getPassword(), 'Email was not corret');
    }

    /**
     * @depends testShouldRetrievePasswordValidForSetPassaword
     * @expectedException        InvalidArgumentException
     */
    public function testShouldRetrieveThrowsInvalidArgumentExceptionSetPasswordEquals()
    {

        if ($this->test instanceof UserRegisterRepositoryAdapterAbstract) {

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

        if ($this->test instanceof UserRegisterRepositoryAdapterAbstract) {

            $this->test->setPassword($this->randon);
            $this->test->setPasswordEquals($this->randon);
            $this->assertEquals($this->randon, $this->test->getPasswordEquals());

        }

    }

    /**
     * @depends testShouldRetrieveEqualsPasswordForSetPasswordEquals
     * @expectedException        OverflowException
     */
    public function testShouldInsertDataForRegister()
    {

       $id = $this->test->setName($this->randon)
            ->setEmail($this->email)
            ->setPassword($this->randon)
            ->setPasswordEquals($this->randon)
            ->register($this->test);
       $this->assertTrue(is_numeric($id) ? True : False);

       //Test OverflowException
       $this->test->setEmail($this->email);
       $this->test->register($this->test);

    }

}
