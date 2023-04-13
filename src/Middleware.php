<?php declare(strict_types=1);
namespace AramHamo\MvcCore;

class Middleware{
  public static function middleware(array|string $middlewares){
    if(gettype($middlewares) == 'array'){
      foreach($middlewares as $middleware ){
        require '../middlewares/'.$middleware.'.php';
      }
    }else{
      require '../middlewares/'.$middlewares.'.php';
    }
  }
}
