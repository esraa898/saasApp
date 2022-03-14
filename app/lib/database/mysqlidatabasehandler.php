<?php 


namespace PHPMVC\lib\Database;

class MySqliDatabaseHandler extends DatabaseHandler
{
    private static $_instance;
    private static $_handler;



    

    public $connection;
    public $query;
    public $sql;
    public function __construct($dbname)
    {
        self::$_handler= $this->connection=mysqli_connect(DATABASE_HOST_NAME,DATABASE_USER_NAME,DATABASE_PASSWORD,$dbname);

    }
    public function __call($name, $arguments)
    {
        return call_user_func_array(array(&self::$_handler, $name),$arguments);
    }
    public function select($table ,$column){
     $this->sql="SELECT $column FROM `$table`";
     return $this;

    }
     
    public function where($column,$compair,$value)
    {
       $this->sql .= "WHERE `$column` $compair '$value'";
     
       return $this;
    } 
    public function andWhere($column,$compair,$value)
    {
       $this->sql .= "AND `$column` $compair '$value'";
     
       return $this;
    } 
    public function orWhere($column,$compair,$value)
    {
       $this->sql .= "OR `$column` $compair '$value'";
     
       return $this;
    } 
    public  function getData()
      {  
        $this->query();
           while($row= mysqli_fetch_assoc($this->query)){
          $data[]=$row;
      } 
      return $data;  
      }

      public  function getRow()
      {
        $this->query();
        $row= mysqli_fetch_assoc($this->query);
       return  $row;

      }

      public function insert($table,$data){
         $row=  $this->prepareData($data);
        
          $this->sql= "INSERT INTO `$table` SET  $row";
          
          return $this;
          

      }

      public function prepareData($data){
        $row="";

        foreach($data as $key => $value){
         $row .= "`$key` = ".(( gettype($value) == 'string') ? "'$value'" : $value ).",";
        }
       
        $row= rtrim($row,",");
         return $row;
      }
        
      public function update($table,$data)
      {

       $row= $this->prepareData($data);
       $this->sql= "UPDATE `$table` SET $row";
       
       return $this;
      }

      public function delete($table){
        $this->sql= "DELETE  FROM `$table` ";
        return $this;
      }
   
      

      public function excute()
      {
        $this->query();
       if (mysqli_affected_rows($this->connection) >0)
       {
           return true;
       }
       else
       {
           return $this->showError();
       } 
    }
    public function query(){
        $this->query=  mysqli_query($this->connection, $this->sql);
        return $this->query;
    }
    public function showError(){
      return mysqli_error_list($this->connection);
    }
      public function __destruct()
      {
           mysqli_close($this->connection); 
           
      }
    //   public static function getInstance($db){
    //       if(self::$_instance === null){
    //           self::$_instance = new self($db);
    //       }
    //       return self::$_instance;
    // }

}