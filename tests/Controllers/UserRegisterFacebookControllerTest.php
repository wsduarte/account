<?php

use App\Http\Controllers\OAuth\RegisterFacebookController;

class RegisterFacebookControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodRegisterInControllerFacebook()
    {
        $class = new RegisterFacebookController();
        $this->assertFalse(
            !method_exists( $class,'register') ? True : False
        );

    }

}
