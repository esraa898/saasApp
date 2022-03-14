<?php
namespace PHPMVC\Model;

class VcardModel  extends AbstractModel
{
private $id;
private $subDomain;
private $database_user;

public static $dbname = 'v-card';
 protected static $tablename = 'users';

protected static $tableSchema= array(
   

  
     'subDomain'=>self::DATA_TYPE_STR,
     'database_user'=>self::DATA_TYPE_STR,
     
 );

 protected static $primaryKey= 'subDomain';


 public function __set($name,$value){
  return $this->$name =$value;
}

public function &__get($prop)
{
   return  $this->$prop;
}


public  function getTableName(){
   return self::$tablename;
}

}
