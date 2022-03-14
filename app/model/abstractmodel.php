<?php

namespace PHPMVC\Model;
use PHPMVC\lib\Database\DatabaseHandler;
 class AbstractModel
 {
     const DATA_TYPE_BOOL    = \PDO::PARAM_BOOL;
     CONST DATA_TYPE_STR     = \PDO::PARAM_STR;
     CONST DATA_TYPE_INT     = \PDO::PARAM_INT;
     CONST DATA_TYPE_DECIMAL = 4;
     protected static $tablename;
     protected static $tableSchema;
     protected static  $primaryKey;
     public static $dbname;




    

     
  // prepare values and put : after named parameter
    protected static function bulidNamedParameter(){
         $namedparam='';
        foreach (static::$tableSchema as $columnName =>$type){
            $namedparam.= $columnName .' = :'.$columnName .',';

        }
        $namedparam= trim($namedparam, ',');
        return $namedparam;
     }


      //bend values
     protected function prepareValues(\PDOStatement &$stmt){
        foreach (static::$tableSchema as $columnName =>$type){
            if ($type == 4){
        $sanitizedvalue=     filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
             $stmt->bindvalue(":{$columnName}",$sanitizedvalue);
       }else{

       
         $stmt->bindvalue(":{$columnName}",$this->$columnName,$type);
        
       }
    }
     }

    // insert new value 
    private function  create(){
       
          $sql = 'INSERT INTO '. static::$tablename.' SET '. self::bulidNamedParameter();
         $stmt= DatabaseHandler::factory(static::$dbname)->prepare($sql);
        $this->prepareValues($stmt);

        var_dump($stmt);
        if($stmt->execute()){
          $this->{static::$primaryKey} =  DatabaseHandler::factory(static::$dbname)->lastInsertId();
          return true ;
        }
         return false ;
        
     }


     //update value 

   private function  Update(){
       
          $sql = 'UPDATE '. static::$tablename.' SET '. self::bulidNamedParameter() .' WHERE '.static::$primaryKey .' = '. $this->{static::$primaryKey};
          $stmt= DatabaseHandler::factory(static::$dbname)->prepare($sql);
         $this->prepareValues($stmt);
         var_dump($stmt);
          return  $stmt->execute();
        
        
     }


     // usable insted of update and insert and determine which one will work dynamiclly ]
     public function save (){
       var_dump($this->{static::$primaryKey});
       return $this->{static::$primaryKey} === null ? $this->create() : $this->Update();
     }

      //delete 
     public function  delete(){

          $sql = 'DELETE FROM '. static::$tablename.' WHERE '.static::$primaryKey .' = '. $this->{static::$primaryKey};
          $stmt=  DatabaseHandler::factory(static::$dbname)->prepare($sql);
         
          return  $stmt->execute();
       
        
     }

     // get all rows in table 
     public  static function getAll(){
    
      $sql ='SELECT * FROM '.static::$tablename;
      $stmt= DatabaseHandler::factory(static::$dbname)->prepare($sql);
      $stmt->execute();
      if(method_exists(get_called_class(), '__construct')) {
        $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
    } else {
        $results = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }
    if ((is_array($results) && !empty($results))) {
        return new \ArrayIterator($results);
    };


    }


     // get value by id to affect it
    public static function  getByPK($pk,$column){

      $sql ='SELECT '.$column.' FROM '.static::$tablename. ' Where ' . static::$primaryKey .'= "' .$pk.'"';
      $stmt= DatabaseHandler::factory(static::$dbname)->prepare($sql);
      if ($stmt->execute() === true) {
      if(method_exists(get_called_class(), '__construct')) {
        $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
       
       }
    else {
        $obj = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
       
    }
        return   !empty($obj) === true ?   array_shift($obj)  : false;
  }
     return false;
    }



    // get element by intering full query
    public static function get($sql ,$options=array()){


      $stmt= DatabaseHandler::factory(static::$dbname)->prepare($sql);
      if(!empty($options)){
        foreach ($options as $columnName =>$type){
          if ($type[0] == 4){
      $sanitizedvalue=     filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
           $stmt->bindvalue(":{$columnName}",$sanitizedvalue);
     }else{

     
       $stmt->bindvalue(":{$columnName}",$type[1],$type[0]);
     }
  }

       
      }
      var_dump($stmt);
      $stmt->execute();
      $result=$stmt->fetchAll(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE,get_called_class(),array_keys(static::$tableSchema));
  
     return is_array($result) && !empty($result) === true ? $result : false ;

   }
   public static function getModelTableName()
   {
       return static::$tablename;
   }
    }
    

 

