<?php

Route::get('/redirecionando', ['as' => 'redirect.login', 'uses' => 'RedirectController@index']);

Route::get('/', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::group(['prefix' => 'autenticar'], function() {
    Route::post('autenticar/post', ['as' => 'authenticate.post', 'uses' => 'LoginController@getPostAuthenticate']);
});

Route::group(['prefix' => 'registrar'], function() {
    Route::get('/', ['as' => 'register', 'uses' => 'RegisterController@register']);
    Route::get('/post', ['as' => 'register.post', 'uses' => 'RegisterController@getPostRegister']);
});

Route::group(['prefix' => 'recuperar-senha'], function() {
    Route::get('/', ['as' => 'recover', 'uses' => 'RecoverPasswordController@recover']);
    Route::post('post', ['as' => 'recover.post', 'uses' => 'RecoverPasswordController@getPostRecover']);
    Route::get('aviso', ['as' => 'recover.notice', 'uses' => 'RecoverPasswordController@notice']);
});

Route::group(['prefix' => 'senha-redefinir'], function() {

    Route::get('/{token}', ['as' => 'reset.password', 'uses' => 'ResetPasswordController@reset']);
    Route::post('/post', ['as' => 'reset.password.post', 'uses' => 'ResetPasswordController@getPostReset']);

});

Route::get('convite-aceitar', ['as' => 'invitation.accept', 'uses' => 'InvitationController@accept']);
Route::get('convite-recusar', ['as' => 'invitation.refused', 'uses' => 'InvitationController@refused']);

/** OAuth 2.0 **/
Route::group(['prefix' => 'oauth'], function() {

    Route::group(['prefix' => 'autenticar'], function() {
        /** OAuth 2.0 **/
        Route::get('facebook', ['as' => 'oauth.authenticate.facebook', 'uses' => 'OAuth\AuthenticateFacebookController@authenticate']);
        Route::get('google', ['as' => 'oauth.authenticate.google', 'uses' => 'OAuth\AuthenticateGoogleController@authenticate']);
        Route::get('twitter', ['as' => 'oauth.authenticate.twitter', 'uses' => 'OAuth\AuthenticateTwitterController@authenticate']);

    });

    Route::group(['prefix' => 'registrar'], function() {
        /** OAuth 2.0 **/
        Route::get('facebook', ['as' => 'oauth.register.facebook', 'uses' => 'OAuth\RegisterFacebookController@register']);
        Route::get('google', ['as' => 'oauth.register.google', 'uses' => 'OAuth\RegisterGoogleController@register']);
        Route::get('twitter', ['as' => 'oauth.register.twitter', 'uses' => 'OAuth\RegisterTwitterController@register']);

    });

});
