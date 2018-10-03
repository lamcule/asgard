<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/category'], function (Router $router) {
    $router->bind('category', function ($id) {
        return app('Modules\Category\Repositories\CategoryRepository')->find($id);
    });
    $router->get('categories', [
        'as' => 'admin.category.category.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:category.categories.index'
    ]);
    $router->get('categories/create', [
        'as' => 'admin.category.category.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:category.categories.create'
    ]);
    $router->post('categories', [
        'as' => 'admin.category.category.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:category.categories.create'
    ]);
    $router->get('categories/{category}/edit', [
        'as' => 'admin.category.category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:category.categories.edit'
    ]);
    $router->put('categories/{category}', [
        'as' => 'admin.category.category.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:category.categories.edit'
    ]);
    $router->delete('categories/{category}', [
        'as' => 'admin.category.category.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:category.categories.destroy'
    ]);
    $router->bind('user', function ($id) {
        return app('Modules\Category\Repositories\UserRepository')->find($id);
    });
    $router->get('users', [
        'as' => 'admin.category.user.index',
        'uses' => 'UserController@index',
        'middleware' => 'can:category.users.index'
    ]);
    $router->get('users/create', [
        'as' => 'admin.category.user.create',
        'uses' => 'UserController@create',
        'middleware' => 'can:category.users.create'
    ]);
    $router->post('users', [
        'as' => 'admin.category.user.store',
        'uses' => 'UserController@store',
        'middleware' => 'can:category.users.create'
    ]);
    $router->get('users/{user}/edit', [
        'as' => 'admin.category.user.edit',
        'uses' => 'UserController@edit',
        'middleware' => 'can:category.users.edit'
    ]);
    $router->put('users/{user}', [
        'as' => 'admin.category.user.update',
        'uses' => 'UserController@update',
        'middleware' => 'can:category.users.edit'
    ]);
    $router->delete('users/{user}', [
        'as' => 'admin.category.user.destroy',
        'uses' => 'UserController@destroy',
        'middleware' => 'can:category.users.destroy'
    ]);

// append
});
