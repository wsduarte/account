<?php

use App\Http\Controllers\OAuth\AuthenticateTwitterController;

class AuthenticateTwitterControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodAuthenticateInControlleTwitter()
    {

        $class = new AuthenticateTwitterController();
        $this->assertFalse(
            !method_exists( $class,'authenticate') ? True : False
        );

    }

}
