<?php declare(strict_types=1);
namespace AramHamo\MvcCore;
use AramHamo\MvcCore\DB;

class Model extends DB{
/*{{{create*/
  function create(){
    $table = json_decode((json_encode($this)),true);
    $keys = array_keys($table);
    $valuesArray = [];
    for($i = 2 ;$i < count($table);$i++){
      $key = $keys[$i];
      $valuesArray[] = $table[$key];
    }
    $i = 0;
    $valuesFields= '';
    while($i < count($keys)-1){
      if($keys[$i] == "_tableName") {$i++;continue;}
      if(count($keys)-2 == $i){
        $valuesFields .= '?';
      }else{
        $valuesFields .= '?,';
      }
      $i++;
    }
    $i = 0;
    $keysFields= '';
    while($i < count($keys)){
      if($keys[$i] == "_tableName") {$i++;continue;}
      if($keys[$i] == "conn") {$i++;continue;}
      if($keys[$i] !== 'conn' || $keys[$i] !== '_tableName'){
        if(count($keys)-1 == $i){
          $keysFields .= $keys[$i];
        }else{
          $keysFields .= $keys[$i].',';
        }
      }
        $i++;
    }
    $tableName = $table["_tableName"];
    foreach($table as $attr){
      if($attr == "_tableName") {continue;}
      if($attr == "conn") {continue;}
      $valuesList[] = $attr;
    }
    $stmt = $this->conn->prepare("INSERT INTO $tableName ($keysFields) values ($valuesFields);");
    $stmt->execute($valuesArray);
  }
/*}}}*/
/*{{{showWhere*/
  function showWhere($key,$value){
    $stmt = $this->conn->prepare("SELECT * FROM $this->_tableName WHERE $key = ? ;");
    $stmt->execute([$value]);
    return $stmt->fetchAll();
  }
/*}}}*/
/*{{{deleteWhere*/
  function deleteWhere($key,$value){
    $tableName = tableName;
    $stmt = $this->conn->prepare("DELETE FROM $tableName WHERE $key = ? ;");
    return $stmt->execute([$value]);
  }
/*}}}*/
/*{{{updateWhere*/
  function updateWhere($setKey,$toValue,$whereKey,$value){
    $tableName = tableName;
    $stmt = $this->conn->prepare("UPDATE $tableName SET $setKey = ? WHERE $whereKey = ? ;");
    return $stmt->execute([$toValue,$value]);
  }
/*}}}*/
/*{{{execute*/
  function execute($sql){
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
  }
/*}}}*/
/*{{{query*/
  function query($sql){
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
/*}}}*/
/*{{{resetThis*/
  function resetThis(){
    foreach ($this as $key => $value) {
      unset($this->$key);
    }
  }
/*}}}*/
}
