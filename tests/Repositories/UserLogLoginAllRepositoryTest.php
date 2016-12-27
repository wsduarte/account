<?php

use App\Repositories\UserLogLoginAllRepository;
use App\Repositories\Adapter\UserLogLoginAllRepositoryAbstract;


class UserLogLoginAllRepositoryTest extends TestCase
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
        $this->test = new UserLogLoginAllRepository();
        $this->assertTrue(method_exists($this->test, 'register'), 'Method was not corret: register');
        $this->email = str_random(10) .'@test.com';
        $this->randon = str_random(10);

    }

    /**
     * @depends setUp
     */
    public function testShouldRetrieveBooleanTrueForRegisterUserLogLoginAll()
    {
        if ($this->test instanceof UserLogLoginAllRepositoryAbstract)

            $this->test->setOAuthFacebook($this->randon);
            $this->test->setOAuthTwitter($this->randon);
            $this->test->setOAuthGoogle($this->randon);
            $this->test->setEmail($this->email);
            $result = $this->test->register();
            $this->assertEquals(true,$result, 'Return bolean was not corret');
    }

}
