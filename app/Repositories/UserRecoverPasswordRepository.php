<?php

namespace App\Repositories;

use App\User;
use App\UserRecoverPassword;
use App\Exceptions\LogQueryException;
use App\Libs\Tools;
use App\Repositories\Adapter\UserRecoverPasswordRepositoryAdapterAbstract;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRecoverPasswordRepository
 * @package App\Repositories
 */
class UserRecoverPasswordRepository extends UserRecoverPasswordRepositoryAdapterAbstract
{

    protected $user;
    protected $recover;

    public function __construct()
    {
        $this->user = new User();
        $this->recover = new UserRecoverPassword();
    }

    /**
     * Registra solicitação
     * @param UserRecoverPasswordRepositoryAdapterAbstract $interface
     * @return bool
     */
    public function recover(UserRecoverPasswordRepositoryAdapterAbstract $interface)
    {

        try {

            if ($this->user->where('email', $interface->getEmail())->count() <=0) {
                throw new \UnderflowException(
                    \Config::get('constants.USER_IS_NOT_REGISTERED'), E_USER_WARNING
                );
            }

            $result =$this->user->where('email', $interface->getEmail())->first();

            $token = sha1(Hash::make(microtime()));
            $recover_name = $result->name;
            $recover_email = $interface->getEmail();
            $recover_subject = 'Recuperação de Senha';
            $recover_link = sprintf('%s/%s', \Config::get('constants-links-app.TPL_EMAIL_RESET_PASSWORD'), $token );

            $data = [
                'name' => $recover_name,
                'email' => $recover_email,
                'subject' => $recover_subject,
                'token' => $token,
                'link' => $recover_link,
                'issued' => Tools::issuedDate(),
            ];

            $send = \Mail::send('email.recover-password',$data, function ($message) use ($recover_email,$recover_subject){
                $message->from(\Config::get('mail.from.contact'))
                        ->to($recover_email)
                        ->subject($recover_subject);
            });

            if (!is_null($send)) {
                throw new \RuntimeException(
                    \Config::get('constants.ERROR_PROCCESS'), E_USER_WARNING
                );
            }

            $this->recover->email = $interface->getEmail();
            $this->recover->user_id = $result->id;
            $this->recover->token = $token;

            return $this->recover->save();

        } catch (QueryException $e) {
            LogQueryException::get($e);
        }

    }

}
