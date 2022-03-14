<?php 
namespace PHPMVC\lib;

class Registry
 {  
     private static $_instance;

public static function getInstance(){
    if(self::$_instance === null){
        self::$_instance = new self();
    }
    return self::$_instance;
}

public function __set($key, $value)
{
    $this->$key =$value;
}
     
public function __get($key){
    return $this->$key;
}
}