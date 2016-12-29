<?php

class UserNavigationRotatingAccountTest extends TestCase
{

    protected $email_test = '__test@test.com';
    protected $password_test = '12346587910';

    public function testRotatingUserLogin()
    {
        $this->visit('/')
             ->see('Entrar');
    }

    public function testClickLinkShouldRetrieveSeePageIsRecoverPassword()
    {

        $this->visit('/')
            ->click('Esqueceu sua senha?')
            ->seePageIs('/recuperar-senha');

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
            ->seePageIs('/registrar');

    }

    /**
     * @depends testRotatingUserLogin
     */
    public function testRotatingLoginRegisterAccountUser()
    {
        $this->visit('/registrar')
             ->see('Cadastre-se');
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

    public function testRecoverPasswordByEmail()
    {
        # code...
    }

    public function testRegisterNewPasswordCommingByEmail()
    {
        # code...
    }

}
