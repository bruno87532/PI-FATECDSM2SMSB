<?php

class Core {
  public function run($routes){
    $url = '/';

    if( isset($_GET['url'])) {
      $url = $url.$_GET['url'];
    }
  
    if( $url != '/') {
      $url = rtrim($url, '/');
    }

    
    $routerFound = false;
    
    foreach ($routes as $path => $controller) {
      $pattern =  '#^'. preg_replace('/{id}/', '(\w+)', $path) .'$#';


      if (preg_match($pattern, $url, $matches)) {
        array_shift($matches);

        $routerFound = true;
        [$currentController, $action] = explode('@', $controller);

        require_once __DIR__."/../controllers/$currentController.php";
  
        $newController = new $currentController();
        $newController->$action($matches);

      }
    }

    if(!$routerFound) {
      require_once __DIR__."/../controllers/NotFoundController.php";
      
      $newController = new NotFoundController();
      $newController->index();
    }
  }
    
}