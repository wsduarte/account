<?php

use App\Http\Controllers\OAuth\UserRegisterFacebookController;

class UserRegisterFacebookControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodRegisterInControllerFacebook()
    {
        $class = new UserRegisterFacebookController();
        $this->assertFalse(
            !method_exists( $class,'register') ? True : False
        );

    }

}
