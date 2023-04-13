<?php declare(strict_types=1);
namespace AramHamo\MvcCore;

class Middleware{
  public function middleware(...$middlewares){
    foreach($middlewares as $middleware){
      if (file_exists('../middlewares/'.$middleware.'.php') && is_readable('../middlewares/'.$middleware.'.php')) {
        include '../middlewares/'.$middleware.'.php';
      }else{
        if(CONFIG["GENERAL"]["DEBUG_MODE"]){
          echo "Error: couldn't find middleware at: middlewares/$middleware.php";
          exit;
        }
        exit;
      }
    }
  }
}
