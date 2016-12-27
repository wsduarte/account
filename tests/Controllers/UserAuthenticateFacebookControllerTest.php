<?php

use App\Http\Controllers\OAuth\UserAuthenticateFacebookController;

class UserAuthenticateFacebookControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodAuthenticateInControllerFacebook()
    {
        $class = new UserAuthenticateFacebookController();
        $this->assertFalse(
            !method_exists( $class,'authenticate') ? True : False
        );

    }

}
