<?php

use App\Http\Controllers\OAuth\UserRegisterGoogleController;

class UserRegisterGoogleControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodRegisterInControllerGoogle()
    {
        $class = new UserRegisterGoogleController();
        $this->assertFalse(
            !method_exists( $class,'register') ? True : False
        );

    }

}
