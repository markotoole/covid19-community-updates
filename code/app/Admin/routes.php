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

        $router->resource('update-requests', 'UpdateRequestController');
    }
);

Route::group(
    [
        'prefix' => config('admin.route.prefix'),
        'namespace' => config('admin.route.namespace'),
        'middleware' => array_merge(config('admin.route.middleware'), ['admin.permission:allow,administrator']),
    ],
    function (Router $router) {


        $router->resource('service-statuses', 'ServiceStatusController');
        $router->resource('categories', 'CategoryController');
        $router->resource('posts', 'PostController');
    }
);
