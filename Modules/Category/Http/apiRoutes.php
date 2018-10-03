<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['middleware' => 'jwt.auth'] , function ($api) {
    $api->group(['middleware' => 'token.admin'], function ($api) {
        $api->get('categories', 'Modules\Category\Http\Controllers\Api\ApiCategoryController@index');
        $api->get('categories/{id}', 'Modules\Category\Http\Controllers\Api\ApiCategoryController@show');
        $api->delete('categories/{id}', 'Modules\Category\Http\Controllers\Api\ApiCategoryController@destroy');
        $api->post('categories', 'Modules\Category\Http\Controllers\Api\ApiCategoryController@store');
        $api->put('categories/{id}', 'Modules\Category\Http\Controllers\Api\ApiCategoryController@update');
    });


});
