<?php

Route::get('', 'UserLoginController@index');
Route::get('registrar', ['as' => 'register', 'uses' => 'UserRegisterController@register']);
Route::post('autenticar', ['as' => 'authenticate', 'uses' => 'UserLoginController@authenticate']);

Route::group(['prefix' => 'recuperar-senha'], function() {
    Route::get('/', ['as' => 'recover', 'uses' => 'UserRecoverPasswordController@recover']);
    Route::post('post', ['as' => 'recover.post', 'uses' => 'UserRecoverPasswordController@getPostRecover']);
    Route::get('aviso', ['as' => 'recover.notice', 'uses' => 'UserRecoverPasswordController@notice']);

});

Route::get('redefinir-senha/{token}', ['as' => 'reset.password', 'uses' => 'UserResetPasswordController@reset']);
Route::get('convite-aceitar', ['as' => 'invitation.accept', 'uses' => 'UserInvitationController@accept']);
Route::get('convite-recusar', ['as' => 'invitation.refused', 'uses' => 'UserInvitationController@refused']);

/** OAuth 2.0 **/
Route::group(['prefix' => 'oauth'], function() {

    Route::group(['prefix' => 'autenticar'], function() {
        /** OAuth 2.0 **/
        Route::get('facebook', ['as' => 'oauth.authenticate.facebook', 'uses' => 'OAuth\UserAuthenticateFacebookController@authenticate']);
        Route::get('google', ['as' => 'oauth.authenticate.google', 'uses' => 'OAuth\UserAuthenticateGoogleController@authenticate']);
        Route::get('twitter', ['as' => 'oauth.authenticate.twitter', 'uses' => 'OAuth\UserAuthenticateTwitterController@authenticate']);

    });

    Route::group(['prefix' => 'registrar'], function() {
        /** OAuth 2.0 **/
        Route::get('facebook', ['as' => 'oauth.register.facebook', 'uses' => 'OAuth\UserRegisterFacebookController@register']);
        Route::get('google', ['as' => 'oauth.register.google', 'uses' => 'OAuth\UserRegisterGoogleController@register']);
        Route::get('twitter', ['as' => 'oauth.register.twitter', 'uses' => 'OAuth\UserRegisterTwitterController@register']);

    });

});
