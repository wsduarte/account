<?php

Route::get('/', ['as' => 'login', 'uses' => 'UserLoginController@index']);
Route::group(['prefix' => 'autenticar'], function() {
    Route::post('autenticar/post', ['as' => 'authenticate.post', 'uses' => 'UserLoginController@getPostAuthenticate']);
});

Route::group(['prefix' => 'registrar'], function() {
    Route::get('/', ['as' => 'register', 'uses' => 'UserRegisterController@register']);
    Route::get('/post', ['as' => 'register.post', 'uses' => 'UserRegisterController@getPostRegister']);
});

Route::group(['prefix' => 'recuperar-senha'], function() {
    Route::get('/', ['as' => 'recover', 'uses' => 'UserRecoverPasswordController@recover']);
    Route::post('post', ['as' => 'recover.post', 'uses' => 'UserRecoverPasswordController@getPostRecover']);
    Route::get('aviso', ['as' => 'recover.notice', 'uses' => 'UserRecoverPasswordController@notice']);
});

Route::group(['prefix' => 'senha-redefinir'], function() {

    Route::get('/{token}', ['as' => 'reset.password', 'uses' => 'UserResetPasswordController@reset']);
    Route::post('/post', ['as' => 'reset.password.post', 'uses' => 'UserResetPasswordController@getPostReset']);

});

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
