<?php

namespace App\Http\Controllers\OAuth;

use App\Contracts\UserRegisterGoogleRepositoryInterface;
use App\Repositories\UserRegisterGoogleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sessions\Subdomains\App\Account\UserSessions;
use Illuminate\Support\Facades\Session;
use OAuth;


class UserRegisterGoogleController extends Controller
{

    public function register(Request $request)
    {

        try {

            // get data from request
            $code = $request->get('code');

            // get google service
            $googleService = OAuth::consumer('Google');

            // check if code is valid

            // if code is provided get user data and sign in
            if ( ! is_null($code))
            {
                // This was a callback request from google, get the token
                $token = $googleService->requestAccessToken($code);

                // Send a request with it
                $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

                $repository = new UserRegisterGoogleRepository();
                if ($repository instanceof UserRegisterGoogleRepositoryInterface) {

                    $repository->setAuthGoogle($result['id']);
                    $repository->setAuthEmail($result['email']);
                    $repository->setAuthVerifiedEmail($result['verified_email']);
                    $repository->setAuthName($result['name']);
                    $repository->setAuthPicture($result['picture']);

                    $data = $repository->register($repository);


//                if (!is_array($data) && $data === false) {
//                    Session::flash('message', \Config::get('constants.OAUTH_NOT_CONNECTED'));
//                    return redirect((string) url('/'));
//                } else {
//                    UserSessions::create($data);
//                    return redirect((string) url('/'));
//                }
                }

            }
            // if not ask for permission first
            else
            {
                // get googleService authorization
                $url = $googleService->getAuthorizationUri();

                if ($request->input('error') == 'access_denied') {
                    Session::flash('message', \Config::get('constants.OAUTH_DENIED'));
                    return redirect((string) url('/'));
                }
                // return to google login url
                return redirect((string)$url);
            }


        } catch (\Exception $e) {

            die($e->getMessage());

        }

    }

}
