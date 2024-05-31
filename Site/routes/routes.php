<?php

$routes = [
    '/' => 'HomeController@index',
    '/login' => 'LoginController@index',
    '/login/auth'  => 'LoginController@autenthication',
    '/cadastro' => 'CadastroController@index',
    '/proximo/validador' => 'ProximoController@validator',
    '/proximo' => 'ProximoController@index',
    '/acesso' => 'CadastraFinalController@insert',
    '/home' => 'LogoutController@index',
    '/consulta' => 'ConsultaController@index'
];