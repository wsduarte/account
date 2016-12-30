<?php

use App\Http\Controllers\OAuth\RegisterGoogleController;

class RegisterGoogleControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodRegisterInControllerGoogle()
    {
        $class = new RegisterGoogleController();
        $this->assertFalse(
            !method_exists( $class,'register') ? True : False
        );

    }

}
