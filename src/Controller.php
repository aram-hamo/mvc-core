<?php declare(strict_types=1);
namespace AramHamo\MvcCore;
use AramHamo\Mvc\Controllers\Home;

class Controller{
    public static function serve($c,$m=""){
      $method = $_SERVER["REQUEST_METHOD"] ?? "GET";
      if(!empty($m)){
        $method = $m;
      }
      if($method == "GET"){
        return $c->get();

      }else if($method == "POST"){
        return $c->post();

      }else if($method == "UPDATE"){
        return $c->update();

      }else if($method == "DELETE"){
        return $c->delete();
      }
    }
}
