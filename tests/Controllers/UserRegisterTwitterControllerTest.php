<?php

use App\Http\Controllers\OAuth\UserRegisterTwitterController;

class UserRegisterTwitterControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodRegisterInControllerTwitter()
    {
        $class = new UserRegisterTwitterController();
        $this->assertFalse(
            !method_exists( $class,'register') ? True : False
        );

    }

}
