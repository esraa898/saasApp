<?php 


namespace PHPMVC\lib\Database;

class PDODatabaseHandler extends DatabaseHandler
{
    private static $_instance;
    private static $_handler;
   

   public function __construct($dbname)
    {
       
        try{
             
               self::$_handler= new \PDO(
                   'mysql:hostname='.DATABASE_HOST_NAME . ';dbname=' .$dbname,
                   DATABASE_USER_NAME,DATABASE_PASSWORD,array(
                       \PDO::ATTR_ERRMODE =>\PDO::ERRMODE_WARNING,
                       \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
                   )
                 
                   );
        }
        catch(\PDOException $e){
            echo"failed".$e->getMessage();
            
        }
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array(&self::$_handler, $name),$arguments);
    }

   
    //   public static function getInstance($db){
    //       if(self::$_instance === null){
    //           self::$_instance = new self($db);
    //       }
    //       return self::$_instance;
    // }

}