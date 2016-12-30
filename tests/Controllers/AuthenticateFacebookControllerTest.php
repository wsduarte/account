<?php

use App\Http\Controllers\OAuth\AuthenticateFacebookController;

class AuthenticateFacebookControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodAuthenticateInControllerFacebook()
    {
        $class = new AuthenticateFacebookController();
        $this->assertFalse(
            !method_exists( $class,'authenticate') ? True : False
        );

    }

}
