<?php 

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->post('login','Modules\UserApp\Http\Controllers\AuthController@login');

    $api->group(['middleware' => ['jwt.auth','jwt.refresh']],function($api){
        $api->get('logout','Modules\UserApp\Http\Controllers\AuthController@logout');
    });

    $api->group(['middleware' => 'jwt.auth'],function($api){
        $api->get('user','Modules\UserApp\Http\Controllers\AuthController@getUser');
    });


});



