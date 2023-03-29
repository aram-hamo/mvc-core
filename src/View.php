<?php declare(strict_types=1);
namespace AramHamo\MvcCore;

class View{
  public static $viewData = array();
  public static function render(String $view,Array $viewData){
    self::$viewData = $viewData;
    return include __DIR__.'/../../../../views/'.$view.'.php';
  }
}
