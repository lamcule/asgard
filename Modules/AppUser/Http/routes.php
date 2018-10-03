<?php

Route::group(['middleware' => 'web', 'prefix' => 'appuser', 'namespace' => 'Modules\AppUser\Http\Controllers'], function()
{
    Route::get('/', 'AppUserController@index');
});
