<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('gps','GPSController@get');
$router->post('gps','GPSController@writeGPS');
$router->post('notify/new','NotificationController@new');
$router->post('user/new','UserController@new_user');
$router->put('user/update/password','UserController@update_password');
$router->put('user/update/name','UserController@update_user_name');
$router->post('user/login','UserController@login');


$router->get('notify/get','NotificationController@get');


// $router->group(['prefix'=>'notify'],function() use ($router){
// 	$router->post('new','NotificationCotroller@new_notification');
// })
// $router->group(['prefix'=>'user'],function() use ($router){
// 	$router->post('new','UserController@new_user');
// 	$router->post('update_password','GPSController@update_user_password');
// });
