<?php

$router->group(['prefix' => 'v1'], function ($router) {
    $router->post('bubble', ['uses' => 'SortController@bubble', 'as' => 'sort.bubble']);
});
