<?php 
namespace PHPMVC\lib\Database;


abstract class DatabaseHandler{


    const DATABASE_DRIVER_PDO =1;
    const DATABASE_DRIVER_MYSQLI = 2;

 

   abstract public function __construct($db);

    // abstract protected  static function getInstance($db);


    public static function factory($db){

        $driver =DATABASE_CONN_DRIVER;
        if($driver == self::DATABASE_DRIVER_PDO){
            return new  PDODatabaseHandler($db);
        }elseif($driver == self::DATABASE_DRIVER_MYSQLI){
            return new MYSQLiDatabaseHandler($db);
        }
    }

    
}