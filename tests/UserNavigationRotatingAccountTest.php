<?php

use App\Repositories\RegisterRepository;
use App\Repositories\Adapter\RegisterRepositoryAdapterAbstract;

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
        $this->test = new RegisterRepository();
        $this->randon = str_random(32);
        $this->email = str_random(32) .'@teste.com';

    }

    public function testRotatingUserLogin()
    {
        $this->visit('/')
             ->see('Entrar');
    }

    /**
     * @test
     */
    public function testRotatingLoginRegisterAccountUser()
    {
        $this->visit('/registrar')
             ->see('Criar conta Administrativa');
    }

    /**
     * @test
     */
    public function testRotatingUserRecoverPassword()
    {
        $this->visit('/recuperar-senha')
             ->see('Esqueceu sua senha');
    }

    /**
     * @test
     */
    public function testRotatingRecoverPasswordNotice()
    {
        $this->visit('/recuperar-senha/aviso')
             ->see('Recuperação da senha solicitada');
    }

    /**
     * @test
     */
    public function testClickLinkShouldRetrieveSeePageIsRecoverPassword()
    {

        $this->visit('/')
            ->click('Esqueceu sua senha?')
            ->seePageIs('/recuperar-senha')
            ->see('Esqueceu sua senha?');

    }

    /**
     * @test
     */
    public function testClickLinkBacktoLoginShouldRetrieveSeePageIsLogin()
    {

        $this->visit('/recuperar-senha')
            ->click('Voltar para login')
            ->seePageIs('/');

    }

    /**
     * @test
     */
    public function testShouldContainLinkAuthenticationLoginFacebook()
    {

        $this->visit('/')
            ->see('/oauth/autenticar/facebook');

    }

    /**
     * @test
     */
    public function testShouldContainLinkAuthenticationLoginGoogle()
    {

        $this->visit('/')
            ->see('/oauth/autenticar/google');

    }

    /**
     * @test
     */
    public function testShouldContainLinkAuthenticationLoginTwitter()
    {

        $this->visit('/')
            ->see('/oauth/autenticar/twitter');

    }

    /**
     * @test
     */
    public function testShouldContainLinkRegisterFacebook()
    {

        $this->visit('/registrar')
            ->see('/oauth/registrar/facebook');

    }

    /**
     * @test
     */
    public function testShouldContainLinkRegisterGoogle()
    {

        $this->visit('/registrar')
            ->see('/oauth/registrar/google');

    }

    /**
     * @test
     */
    public function testShouldContainLinkRegisterTwitter()
    {

        $this->visit('/registrar')
            ->see('/oauth/registrar/twitter');

    }

    /**
     * @test
     */
    public function testClickLinkShouldRetrieveSeePageIsRegister()
    {

        $this->visit('/')
            ->click('Crie Agora, é Grátis!')
            ->seePageIs('/registrar')
            ->see('Cadastre-se com um destes serviços');

    }

    /**
     * @test
     */
    public function testRotatingWithUsernamePasswordViaPost()
    {

        $this->visit('/')
            ->type('test@test.com', 'email')
            ->type($this->randon, 'password')
            ->press('Fazer Login')
            ->see('O e-mail ou a senha inseridos estão incorretos.');

    }

    /**
     * @test
     */
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
