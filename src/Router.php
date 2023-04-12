<?php declare(strict_types=1);
namespace AramHamo\MvcCore;
use AramHamo\MvcCore\Routes;

class Router{
  public function listen($req){
  if(CONFIG["GENERAL"]["DEBUG_MODE"]){
    ini_set("display_errors","On");
    ini_set("display_startup_errors","On");
    ini_set("log_errors","On");
    error_reporting(E_ALL);
  }else{
    ini_set("display_errors","Off");
    ini_set("display_startup_errors","Off");
    ini_set("log_errors","Off");
  }

  $req = strtolower($req);
  $exlen = strlen($req);
  if(isset($req[$exlen-1]) && $req[$exlen-1] == "/"){
    $preq = substr($req,0,-1);
  }else{
    $preq = $req;
  }

  $exlen = strlen($preq);
  if(isset($preq[1]) && $preq[0] == '/'){
      $preq = substr($preq,1,strlen($preq)-1);
  }
  Routes::listen($preq);
  }
}
