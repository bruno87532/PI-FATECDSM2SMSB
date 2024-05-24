<?php

$routes = [
    '/' => 'HomeController@index',
    '/login' => 'LoginController@index',
    '/login/auth'  => 'LoginController@autenthication',
    '/cadastro' => 'CadastroController@index'
];