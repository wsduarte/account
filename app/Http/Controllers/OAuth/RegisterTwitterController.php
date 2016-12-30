<?php

namespace App\Http\Controllers\OAuth;

use App\Contracts\UserRegisterTwitterRepositoryInterface;
use App\Repositories\UserRegisterTwitterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sessions\Subdomains\App\Account\UserSessions;
use Illuminate\Support\Facades\Session;
use OAuth;

class RegisterTwitterController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new UserRegisterTwitterRepository();
    }

    public function register(Request $request)
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

                if ($this->repository instanceof UserRegisterTwitterRepositoryInterface) {

                    $this->repository->setAuthTwitter($result['id_str']);
                    $this->repository->setAuthName($result['name']);
                    $this->repository->setAuthPicture($result['profile_image_url']);
                    $this->repository->setAuthBiography($result['description']);
                    $this->repository->setAuthLocation($result['location']);
                    $this->repository->setAuthSite($result['entities']['url']['urls']['0']['expanded_url']);

                    $data = $this->repository->register($this->repository);
//                if (!is_array($data) && $data === false) {
//                    Session::flash('message', \Config::get('constants.OAUTH_NOT_CONNECTED'));
//                    return redirect((string) url('/'));
//                } else {
//                    UserSessions::create($data);
//                    return redirect((string) url('/'));
//                }

                    return redirect()->route('redirect.login');

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

            Session::put('message', $e->getMessage());
            return redirect()->route('login');

        }

    }

}
