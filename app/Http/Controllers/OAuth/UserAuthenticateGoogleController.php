<?php

namespace App\Http\Controllers\OAuth;

use App\Contracts\UserAuthenticateGoogleRepositoryInterface;
use App\Repositories\UserAuthenticateGoogleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sessions\Subdomains\App\Account\UserSessions;
use Illuminate\Support\Facades\Session;
use OAuth;

class UserAuthenticateGoogleController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new UserAuthenticateGoogleRepository();
    }

    public function authenticate(Request $request)
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

                if ($this->repository instanceof UserAuthenticateGoogleRepositoryInterface) {

                    $this->repository->setAuthGoogle($result['id']);
                    $this->repository->setAuthEmail($result['email']);
                    $this->repository->setAuthVerifiedEmail($result['verified_email']);
                    $this->repository->setAuthName($result['name']);
                    $this->repository->setAuthPicture($result['picture']);

                    $data = $this->repository->authenticate($this->repository);

                    dd($data);


//                if (!is_array($data) && $data === false) {
//                    Session::flash('message', Config::get('constants.OAUTH_NOT_CONNECTED'));
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
                    Session::flash('message', Config::get('constants.OAUTH_DENIED'));
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
