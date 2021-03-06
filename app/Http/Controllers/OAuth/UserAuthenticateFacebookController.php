<?php

namespace App\Http\Controllers\OAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\UserFacebookRepository;
use App\Sessions\Subdomains\App\Account\UserSessions;
use Illuminate\Support\Facades\Session;
use Config;
use OAuth;

class UserAuthenticateFacebookController extends Controller
{

    public function authenticate(Request $request)
    {
        // get data from request
        $code = $request->get('code');

        // get fb service
        $fb = OAuth::consumer('Facebook');

        // check if code is valid

        // if code is provided get user data and sign in
        if ( ! is_null($code))
        {
            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken($code);

            // Send a request with it
            $result = json_decode($fb->request('/me?locale=pt_BR&fields=id,name,email,gender,locale,link,age_range,cover,picture,timezone,updated_time'), true);

            $repository = new UserFacebookRepository();
            if ($repository instanceof UserRepositoryInterface) {
                $data = $repository->authenticate($result);
                if (!is_array($data) && $data === false) {
                    Session::flash('message', Config::get('constants.OAUTH_NOT_CONNECTED'));
                    return redirect((string) url('/'));
                } else {
                    UserSessions::create($data);
                    return redirect((string) url('/'));
                }
            }

        }
        // if not ask for permission first
        else
        {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            if ($request->input('error') == 'access_denied') {
                Session::flash('message', Config::get('constants.OAUTH_DENIED'));
                return redirect((string) url('/'));
            }

            // return to facebook login url
            return redirect((string)$url);
        }

    }

}
