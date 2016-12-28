<?php

namespace App\Http\Controllers\OAuth;

use App\Contracts\UserRegisterFacebookRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Repositories\UserRegisterFacebookRepository;
use App\Sessions\Subdomains\App\Account\UserSessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use OAuth;


class UserRegisterFacebookController extends Controller
{

    public function register(Request $request)
    {

        try {


            // get data from request
            $code = $request->get('code');

            // get fb service
            $fb = OAuth::consumer('Facebook');

            // check if code is valid

            // if code is provided get user data and sign in
            if (!is_null($code)) {
                // This was a callback request from facebook, get the token
                $token = $fb->requestAccessToken($code);

                // Send a request with it
                $result = json_decode($fb->request('/me?locale=pt_BR&fields=id,name,email,gender,locale,link,age_range,cover,picture,timezone,updated_time'), true);


                $repository = new UserRegisterFacebookRepository();
                if ($repository instanceof UserRegisterFacebookRepositoryInterface) {

                    $repository->setAuthFacebook($result['id']);
                    $repository->setAuthEmail($result['email']);
                    $repository->setAuthName($result['name']);
                    $repository->setAuthPicture($result['picture']['data']['url']);
                    $repository->setAuthUrlFacebook($result['link']);

                    $data = $repository->register($repository);

//                    if (!is_array($data) && $data === false) {
//                        Session::flash('message', \Config::get('constants.OAUTH_NOT_CONNECTED'));
//                        return redirect((string)url('/'));
//                    } else {
//                        UserSessions::create($data);
//                        return redirect((string)url('/'));
//                    }
                }

            } // if not ask for permission first
            else {
                // get fb authorization
                $url = $fb->getAuthorizationUri();

                if ($request->input('error') == 'access_denied') {
                    Session::flash('message', \Config::get('constants.OAUTH_DENIED'));
                    return redirect((string)url('/'));
                }

                // return to facebook login url
                return redirect((string)$url);
            }


        } catch (\Exception $e) {

            die($e->getMessage());

        }


    }

}
