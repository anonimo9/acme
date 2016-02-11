<?php

// REGISTER ROUTES
$router->map('GET','/register','Acme\Controllers\RegisterController@getShowRegisterPage','register');
$router->map('POST','/register','Acme\Controllers\RegisterController@postShowRegisterPage','register_post');

// LOGIN/LOGOUT ROUTES
$router->map('GET','/login','Acme\Controllers\AuthenticationController@getShowLoginPage','login');
$router->map('POST','/login','Acme\Controllers\AuthenticationController@postShowLoginPage','login_post');
$router->map('GET','/logout','Acme\Controllers\AuthenticationController@getLogout','logout');
$router->map('GET','/testuser','Acme\Controllers\AuthenticationController@getTestUser','test_user');

// SENDING EMAILS
$router->map('GET', '/testemail', 'Acme\Controllers\AuthenticationController@getTestEmail','test_mail');

// PAGE ROUTES
$router->map('GET','/','Acme\Controllers\PageController@getShowHomePage','home');
$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@getShow404', '404');
$router->map('GET','/[*]','Acme\Controllers\PageController@getShowPage','generic_page');