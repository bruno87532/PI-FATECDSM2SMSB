<?php
require_once __DIR__."/../utils/autoload.php";
spl_autoload_register(function($class){
    $file = __DIR__."/../class/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    }
});

spl_autoload_register(function($class){
    $file = __DIR__."/../utils/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    }
});

spl_autoload_register(function($class){
    $file = __DIR__."/../core/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    }
});

spl_autoload_register(function($class){
    $file = __DIR__."/../models/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    }
});

?>