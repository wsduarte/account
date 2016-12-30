<?php

use App\Repositories\RegisterRepository;
use App\Repositories\AuthenticateRepository;

class AuthenticateRepositoryTest extends TestCase
{

    protected $test;
    protected $email;
    protected $randon;

    /**
     * @test
     */
    public function setUp()
    {
        parent::setUp();
        $this->test = new AuthenticateRepository();
        if($this->test instanceof AuthenticateRepositoryInterface) {
            $this->assertTrue(method_exists($this->test, 'getEmail'), 'Method was not corret: getEmail');
            $this->assertTrue(method_exists($this->test, 'setEmail'), 'Method was not corret: setEmail');
            $this->assertTrue(method_exists($this->test, 'getPassword'), 'Method was not corret: getPassword');
            $this->assertTrue(method_exists($this->test, 'setPassword'), 'Method was not corret: setPassword');
            $this->assertTrue(method_exists($this->test, 'autheticate'), 'Method was not corret: autheticate');
        }

        $this->email = str_random(10) .'@test.com';
        $this->randon = str_random(10);

    }

    /**
     * @depends setUp
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
        $this->assertEquals($this->randon,$this->test->getPassword(), 'Password was not corret');
        $this->assertEquals($this->randon,$this->test->getPassword(), 'Password was not corret');
    }

    /**
     * @depends testShouldRetrievePasswordValidForSetPassaword
     * @expectedException        UnderflowException
     */
    public function testShouldExistsThrowsUnderflowExceptionForAuthenticate()
    {
        $this->test->setEmail($this->email)
             ->setPassword($this->randon);
        $this->test->autheticate($this->test);

    }

    /**
     * @depends testShouldExistsThrowsUnderflowExceptionForAuthenticate
     */
    public function testShouldRegisterAndAuthenticateUser()
    {

        $this->register = new RegisterRepository();

        $id = $this->register->setName($this->randon)
             ->setEmail($this->email)
             ->setPassword($this->randon)
             ->register($this->register);
        $this->assertTrue(is_numeric($id) ? True : False);

        $data = $this->test->setEmail($this->email)
                   ->setPassword($this->randon)
                   ->autheticate($this->test);
        $this->assertEquals($this->email,$data->email);

    }

}
