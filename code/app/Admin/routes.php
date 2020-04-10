<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group(
    [
        'prefix' => config('admin.route.prefix'),
        'namespace' => config('admin.route.namespace'),
        'middleware' => config('admin.route.middleware'),
    ],
    function (Router $router) {

        $router->get('/', 'HomeController@index')
               ->name('admin.home');
        $router->resource('service-statuses', 'ServiceStatusController');
        $router->resource('categories', 'CategoryController');
        $router->resource('update-requests', 'UpdateRequestController');
        $router->resource('posts', 'PostController');
    }
);
