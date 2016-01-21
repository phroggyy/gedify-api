<?php

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->post('reverse', ['uses' => 'ApiController@reverse', 'as' => 'strings.reverse']);
});