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
    // public function testClickLinkFacebookShouldRetrieveSeePageIsLogin()
    // {
    //
    //     $this->visit('/')
    //         ->click('Fazer login com o Facebook')
    //         ->seePageIs('/oauth/autenticar/facebook');
    //
    // }

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
