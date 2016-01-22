<?php

$router->group(['prefix' => 'v1'], function ($router) {
    $router->post('reverse', ['uses' => 'ApiController@reverse', 'as' => 'strings.reverse']);
});