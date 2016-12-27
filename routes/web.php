<?php

Route::get('', 'UserLoginController@index');
Route::get('registrar', ['as' => 'registrar', 'uses' => 'UserRegisterController@register']);
Route::post('autenticar', ['as' => 'autenticar', 'uses' => 'UserLoginController@authenticate']);
Route::get('recuperar-senha', ['as' => 'recuperar-senha', 'uses' => 'UserRecoverPasswordController@recover']);
Route::get('redefinir-senha', ['as' => 'redefinir-senha', 'uses' => 'UserResetPasswordController@reset']);
Route::get('convite-aceitar', ['as' => 'convite-aceitar', 'uses' => 'UserInvitationController@accept']);
Route::get('convite-recusar', ['as' => 'convite-recusar', 'uses' => 'UserInvitationController@refused']);

/** OAuth 2.0 **/
Route::group(['prefix' => 'oauth'], function() {

    Route::group(['prefix' => 'autenticar'], function() {
        /** OAuth 2.0 **/
        Route::get('facebook', ['as' => 'oauth.autenticar.facebook', 'uses' => 'OAuth\UserAuthenticateFacebookController@authenticate']);
        Route::get('google', ['as' => 'oauth.autenticar.google', 'uses' => 'OAuth\UserAuthenticateGoogleController@authenticate']);
        Route::get('twitter', ['as' => 'oauth.autenticar.twitter', 'uses' => 'OAuth\UserAuthenticateTwitterController@authenticate']);

    });

    Route::group(['prefix' => 'registrar'], function() {
        /** OAuth 2.0 **/
        Route::get('facebook', ['as' => 'oauth.registrar.facebook', 'uses' => 'OAuth\UserRegisterFacebookController@register']);
        Route::get('google', ['as' => 'oauth.registrar.google', 'uses' => 'OAuth\UserRegisterGoogleController@register']);
        Route::get('twitter', ['as' => 'oauth.registrar.twitter', 'uses' => 'OAuth\UserRegisterTwitterController@register']);

    });

});
