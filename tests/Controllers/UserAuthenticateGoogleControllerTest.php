<?php

use App\Http\Controllers\OAuth\UserAuthenticateGoogleController;

class UserAuthenticateGoogleControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodAuthenticateInControlleGoogle()
    {
        $class = new UserAuthenticateGoogleController();
        $this->assertFalse(
            !method_exists( $class,'authenticate') ? True : False
        );

    }

}
