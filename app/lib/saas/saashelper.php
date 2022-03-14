<?php 
namespace PHPMVC\lib\Saas;



class SaasHelper 
{
    public static function handelHost($username){
        file_put_contents("C:\Windows\System32\drivers\\etc\hosts","  127.0.0.1     $username.saasapp.test",FILE_APPEND | LOCK_EX);
    }

    public static function generateDataBase($username){
        $create_db= "CREATE DATABASE `$username`";
        $connect= mysqli_connect(DATABASE_HOST_NAME,DATABASE_USER_NAME,DATABASE_PASSWORD);
        mysqli_query($connect,$create_db);
        static::runSql($username);
    }

    protected static function runSql($username){
        $content = file_get_contents(dirname(__FILE__)."\database\user_vcard.sql");
        $database= mysqli_connect(DATABASE_HOST_NAME,DATABASE_USER_NAME,DATABASE_PASSWORD,$username);
        mysqli_multi_query($database,$content);
    }
}