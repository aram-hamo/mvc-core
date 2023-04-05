<?php declare(strict_types=1);
namespace AramHamo\MvcCore;
use  AramHamo\MvcCore\DB;

class Schema extends DB{
/*{{{create*/
  public function create(String $table_name,Array $attr,String $options){
    $keys = array_keys($attr);
    $i = 0;
    $fields = '';
    foreach($keys as $key){
      if(count($attr)-1 == $i){
        $fields .= $attr[$key];
      }else{
        $fields .= $attr[$key].",";
      }
      $i++;
    }
    $stmt = "CREATE TABLE IF NOT EXISTS $table_name (".$fields.$options.");";
    if(CONFIG["GENERAL"]["DEBUG_MODE"]){
      echo "$stmt\n";
    }
    $createTable = $this->conn->exec($stmt);
  }
/*}}}*/
/*{{{dropIfExists*/
  public function dropIfExists(String $tableName){
    if(CONFIG["GENERAL"]["DEBUG_MODE"]){
      echo "DROP TABLE IF EXISTS ".$tableName."\n";
    }
    $tdrop = $this->conn->prepare("DROP TABLE IF EXISTS ".$tableName);
    return $tdrop->execute();
  }
/*}}}*/
}
