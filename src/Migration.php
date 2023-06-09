<?php declare(strict_types=1);
namespace AramHamo\MvcCore;

class Migration{
  public $table = [];
  public $options = '';
/*{{{id*/
  public function id():Object{
    if(CONFIG["DATABASE"]["SOFTWARE"] == "sqlite"){
      $this->table["id"] = "id INTEGER PRIMARY KEY AUTOINCREMENT";
    }else{
      $this->table["id"] = "id INTEGER PRIMARY KEY AUTO_INCREMENT";
    }
    return $this;
  }
/*}}}*/
/*{{{text*/
  public function text(String $attr,int $length=0):Object{
    if($length < 1){
      $this->table["$attr"] = "$attr TEXT";
    }else{
      $this->table["$attr"] = "$attr TEXT($length)";
    }
    return $this;
  }
/*}}}*/
/*{{{char*/
  public function char(String $attr,int $length=0):Object{
    return $this->text($attr,$length);
  }

  public function varchar(String $attr,int $length=0):Object{
    return $this->text($attr,$length);
  }
/*}}}*/
/*{{{int*/
  public function int(String $attr,int $length=0):Object{
    if($length < 1){
      $this->table[$attr] = "$attr INTEGER";
    }else{
      $this->table[$attr] = "$attr INTEGER($length)";
    }
    return $this;
  }
/*}}}*/
/*{{{bool*/
  public function bool(String $attr):Object{
    $this->table[$attr] = "$attr BOOLEAN";
    return $this;
  }
/*}}}*/
/*{{{blob*/
  public function blob(String $attr):Object{
    $this->table[$attr] = "$attr BLOB";
    return $this;
  }
/*}}}*/
/*{{{primaryKey*/
  public function primaryKey($attr):Object{
    $this->table[$attr] .= " PRIMARY KEY";
    return $this;
  }
/*}}}*/
/*{{{unique*/
  public function unique($attr):Object{
    $this->table[$attr] .= " UNIQUE";
    return $this;
  }
/*}}}*/
/*{{{foreignKey*/
  public function foreignKey(String $attr,String $table,String $tableAttr):Object{
    $this->options .= ",FOREIGN KEY($attr) REFERENCES $table($tableAttr)";
    return $this;
  }
/*}}}*/
/*{{{notNull*/
  public function notNull($attr):Object{
    $this->table[$attr] .= " NOT NULL";
    return $this;
  }
/*}}}*/
/*{{{autoincrement*/
  public function autoincrement($attr):Object{
    if(CONFIG["DATABASE"]["SOFTWARE"] == "sqlite"){
      $this->table[$attr] .= " AUTOINCREMENT";
    }else{
      $this->table[$attr] .= " AUTO_INCREMENT";
    }
    return $this;
  }
/*}}}*/
}
