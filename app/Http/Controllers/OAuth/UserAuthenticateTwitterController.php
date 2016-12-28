<?php

namespace App\Http\Controllers\OAuth;

use App\Contracts\UserAuthenticateTwitterRepositoryInterface;
use App\Repositories\UserAuthenticateTwitterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sessions\Subdomains\App\Account\UserSessions;
use Illuminate\Support\Facades\Session;
use OAuth;

class UserAuthenticateTwitterController extends Controller
{

    public function authenticate(Request $request)
    {

        try {

            // get data from request
            $token  = $request->get('oauth_token');
            $verify = $request->get('oauth_verifier');

            // get twitter service
            $tw = OAuth::consumer('Twitter');

            // check if code is valid

            // if code is provided get user data and sign in
            if ( ! is_null($token) && ! is_null($verify))
            {
                // This was a callback request from twitter, get the token
                $token = $tw->requestAccessToken($token, $verify);

                // Send a request with it
                $result = json_decode($tw->request('account/verify_credentials.json'), true);

                $repository = new UserAuthenticateTwitterRepository();
                if ($repository instanceof UserAuthenticateTwitterRepositoryInterface) {

                    $repository->setAuthTwitter($result['id_str']);
                    $repository->setAuthName($result['name']);
                    $repository->setAuthPicture($result['profile_image_url']);
                    $repository->setAuthBiography($result['description']);
                    $repository->setAuthLocation($result['location']);
                    $repository->setAuthSite($result['entities']['url']['urls']['0']['expanded_url']);


                    $data = $repository->authenticate($repository);

                    dd($data);
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
                // get request token
                $reqToken = $tw->requestRequestToken();

                // get Authorization Uri sending the request token
                $url = $tw->getAuthorizationUri(['oauth_token' => $reqToken->getRequestToken()]);

                if (!empty($request->input('denied'))) {
                    Session::flash('message', \Config::get('constants.OAUTH_DENIED'));
                    return redirect((string) url('/'));
                }
                // return to twitter login url
                return redirect((string)$url);
            }

        } catch (\Exception $e) {

            die($e->getMessage());

        }

    }

}
