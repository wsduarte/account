<?php

use App\Http\Controllers\OAuth\RegisterTwitterController;

class RegisterTwitterControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodRegisterInControllerTwitter()
    {
        $class = new RegisterTwitterController();
        $this->assertFalse(
            !method_exists( $class,'register') ? True : False
        );

    }

}
