<?php

return array(
    '/' => [
        'method' => 'get',
        'target' => 'HomeController@index',
        'middleware' => ''
    ],

    '/articles' => [
        'method' => 'get',
        'target' => 'ArticleController@index',
        'middleware' => ''
    ],
    '/crypto/price' => [
         'method' => 'get',
         'target' => 'CryptoController@index',
         'middleware' => ''
    ],

    '/auth/login' => [
        'method' => 'get|post',
        'target' => 'AuthController@login',
        'middleware' => 'IEBlocker'

    ],

    '/auth/register' => [
        'method' => 'get|post',
        'target' => 'AuthController@register'

    ]
);
