<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Route;
use Illuminate\Routing\RouteCollection;

class UserNavigationRotatingAccountTest extends TestCase
{

    protected $email_test = '__test@test.com';
    protected $password_test = '12346587910';

    public function testRotatingUserLogin()
    {
        $this->visit('/')
             ->see('Entrar');
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

        $credentials = array(
	        'email' => $this->email_test,
	        'password' => $this->password_test,
	        '_test' => true,
	        '_token' => Session::token()
        );

    	$response = $this->call('POST', '/autenticar', $credentials);
    	$content = $response->getContent();
        $this->assertContains('Redirecionando',$content);

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
