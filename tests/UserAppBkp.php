<?php

//https://phpunit.de/manual/current/pt_br/appendixes.assertions.html#appendixes.assertions.assertContains

class UserAppBkp
{

    public function testExistMethodIndexDoLogin()
    {
        $this->visit('/')
             ->see('Entrar');
    }

    public function testExistMethodUserRegister()
    {
        $this->visit('/registrar')
             ->see('Cadastre-se');
    }

    public function testExistMethodRecoverPassword()
    {
        $this->visit('/recuperar-senha')
             ->see('Esqueceu sua senha');
    }


//     public function testAutenticarUser()
//     {
//         $response = $this->call('POST', '/autenticar');
//         $this->assertResponseOk();
//        // $response = $this->call('GET', '/');
        // $this->assertResponseOk();
        // $this->assertContains('_token', $response->getContent());
//
//
//
//
//
//
//
//         $this->assertRedirectedTo('foo');
//
// $this->assertRedirectedToRoute('route.name');
//
// $this->assertRedirectedToAction('Controller@method');
//
//
//     }


    public function testIndex()
	{

    	$response = $this->call('GET', '/');
    	$content = $response->getContent();
    	//$this->assertViewHas('Fazer login', true);

    	if(strpos($content, 'name="_token"') !== false ){
    		$this->assertTrue(true);
    	} else {
    		$this->assertTrue(false);
    	}
    	//$this->assertResponseOk();

	}

	/**
	* @tests
	*/
	public function testUserAuthenticate()
	{

	    $credentials = array(
	        'email' => 'wsduarte@hotmail.com',
	        'password' => 'password',
	        '_test' => 'True',
	        '_token' => Session::token()
        );

    	$response = $this->call('POST', '/autenticar', $credentials);
    	$content = $response->getContent();



        $this->assertViewHas('redirecionar', null);

    	if(strpos($content, '/redirecionar') !== false ){
    		$this->assertTrue(true);
    	} else {
    		$this->assertTrue(false);
    	}

    	//$this->assertRedirectedToRoute('/redirecionar');
    	//$this->assertResponseOk();
        //$this->assertViewHas('autenticar', null);

	}


}
