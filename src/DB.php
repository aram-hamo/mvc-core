<?php declare(strict_types=1);
namespace AramHamo\MvcCore;
use \PDO;
class DB {
  public $conn;
  function __construct(){

    switch(CONFIG["DATABASE"]["SOFTWARE"]){
      case "mysql":
        $GLOBALS["dsn"] = "mysql:host=". CONFIG["DATABASE"]["HOST"].";dbname=". CONFIG["DATABASE"]["NAME"];
        $this->conn = new \PDO($GLOBALS["dsn"],CONFIG["DATABASE"]["USERNAME"],CONFIG["DATABASE"]["PASSWORD"]);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      break;
      case "sqlite":
        $GLOBALS["dsn"] = "sqlite:/".__DIR__."/../../../../". CONFIG["DATABASE"]["PATH"];
        $this->conn = new \PDO($GLOBALS["dsn"]);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      break;
    }
  }
}
