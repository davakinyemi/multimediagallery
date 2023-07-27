<?php

$Router = new app\Routes\Router;
$Controllers = 'app\Controllers';

if ($_SERVER['REQUEST_URI'] === '/' && isset($_SESSION['login'])) {
    (new app\Controllers\Controller)->home();
}

/**
 * POST Routes
 */
// $Router->post('/', "$Controllers\Controller", '');
$Router->post('/sign-up', "$Controllers\AuthController", 'storeSignUp');
$Router->post('/sign-in', "$Controllers\AuthController", 'storeSignIn');
$Router->post('/new-channel', "$Controllers\ChannelController", 'channelStore');
$Router->post('/create-content', "$Controllers\ChannelContentController", 'storeCreateContent');
$Router->post('/add-playlist', "$Controllers\UserController", 'addToPlaylist');

/**
 * PUT Routes
 */
// $Router->put('/', "$Controllers\Controller", '');
$Router->put('/update-profile', "$Controllers\UserController", 'setProfile');
$Router->put('/channel-content', "$Controllers\ChannelContentController", 'setLike');
$Router->put('/channel', "$Controllers\ChannelController", 'setSubscriber');

/**
 * GET Routes
 */
// $Router->get('/', "$Controllers\Controller", '');
$Router->get('/home', "$Controllers\Controller", 'home');
$Router->get('/sign-up', "$Controllers\AuthController", 'signUp');
$Router->get('/sign-in', "$Controllers\AuthController", 'signIn');
$Router->get('/new-channel', "$Controllers\ChannelController", 'index');
$Router->get("/channel/?id=", "$Controllers\ChannelController", 'getChannel');
$Router->get('/profile', "$Controllers\UserController", 'profile');
$Router->get('/create-content', "$Controllers\ChannelContentController", 'createContent');
$Router->get('/channel-content', "$Controllers\ChannelContentController", 'content');
$Router->get('/playlists', "$Controllers\UserController", 'playlists');
$Router->get('/favourites', "$Controllers\UserController", 'playlists');
$Router->get('/content-creators', "$Controllers\ChannelController", 'creators');
$Router->get('/?logout', "$Controllers\UserController", 'setLogout');
$Router->get('/search-page', "$Controllers\Controller", 'searchPage');
$Router->get('/exception-handler', "$Controllers\Controller", 'exceptionHandler');
$Router->get('/', "$Controllers\AuthController", 'signIn');
