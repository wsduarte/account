<?php

use App\Http\Controllers\OAuth\AuthenticateGoogleController;

class AuthenticateGoogleControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodAuthenticateInControlleGoogle()
    {
        $class = new AuthenticateGoogleController();
        $this->assertFalse(
            !method_exists( $class,'authenticate') ? True : False
        );

    }

}
