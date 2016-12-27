<?php

use App\Http\Controllers\OAuth\UserAuthenticateTwitterController;

class UserAuthenticateTwitterControllerTest extends TestCase
{

    /**
     * @test
     */
    public function testShouldExistMethodAuthenticateInControlleTwitter()
    {

        $class = new UserAuthenticateTwitterController();
        $this->assertFalse(
            !method_exists( $class,'authenticate') ? True : False
        );

    }

}
