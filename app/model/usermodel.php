<?php
namespace PHPMVC\Model;

use PHPMVC\lib\Database\DatabaseHandler;

class UserModel  extends AbstractModel
{
private $id;
private $name;
private $title;
private $phone;
private $whatsapp;
private $email;
private $adress;
private $image;
private $cover;


public static $dbname ='user_vcard';

 protected static $tablename ='user';

protected static $tableSchema= array(
   
  'id'       =>self::DATA_TYPE_STR   ,
  'name'     =>self::DATA_TYPE_STR,
  'title'    =>self::DATA_TYPE_STR,
  'phone'    =>self::DATA_TYPE_STR,
  'whatsapp' =>self::DATA_TYPE_STR,
  'email'    =>self::DATA_TYPE_STR,
  'adress'   =>self::DATA_TYPE_STR,
  'image'    =>self::DATA_TYPE_STR,
  'cover'    =>self::DATA_TYPE_STR,
  
    
 );



 protected static $primaryKey= 'id';


 
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
public static   function getDBname(){
  return static::$dbname ;
}

}
