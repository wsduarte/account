<?php

use App\Repositories\UserRegisterRepository;
use App\Repositories\Adapter\UserRegisterRepositoryAdapterAbstract;

class UserNavigationRotatingAccountTest extends TestCase
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
        $this->randon = str_random(10);
        $this->email = str_random(10) .'@teste.com';

    }

    public function testRotatingUserLogin()
    {
        $this->visit('/')
             ->see('Entrar');
    }

    public function testClickLinkShouldRetrieveSeePageIsRecoverPassword()
    {

        $this->visit('/')
            ->click('Esqueceu sua senha?')
            ->seePageIs('/recuperar-senha')
            ->see('Esqueceu sua senha?');

    }

    public function testClickLinkShouldRetrieveSeePageIsLogin()
    {

        $this->visit('/recuperar-senha')
            ->click('Voltar para login')
            ->seePageIs('/');

    }

    public function testClickLinkShouldRetrieveSeePageIsRegister()
    {

        $this->visit('/')
            ->click('Crie Agora, é Grátis!')
            ->seePageIs('/registrar')
            ->see('Cadastre-se com um destes serviços');

    }

    /**
     * @depends testRotatingUserLogin
     */
    public function testRotatingLoginRegisterAccountUser()
    {
        $this->visit('/registrar')
             ->see('Cadastre-se com um destes serviços');
    }

    /**
     * @depends testRotatingLoginRegisterAccountUser
     */
    public function testRotatingUserRecoverPassword()
    {
        $this->visit('/recuperar-senha')
             ->see('Esqueceu sua senha');
    }

    public function testRotatingWithUsernamePasswordViaPost()
    {

        $this->visit('/')
            ->type('test@test.com', 'email')
            ->press('Fazer Login')
            ->see('O e-mail ou a senha inseridos estão incorretos.');

    }

    public function testClickLinkShouldRetrieveSeePageIsNotice()
    {

        $this->test->setName($this->randon)
             ->setEmail($this->email)
             ->setPassword($this->randon)
             ->register($this->test);

        $this->visit('/recuperar-senha')
            ->type($this->email, 'email')
            ->press('Recuperar Senha')
            ->seePageIs('/recuperar-senha/aviso')
            ->see('Recuperação da senha solicitada');

    }

}
