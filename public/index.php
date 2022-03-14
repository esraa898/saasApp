<?php
namespace PHPMVC;


use PHPMVC\LIB\FrontController;
use PHPMVC\lib\Language;
use PHPMVC\lib\Saas\Saas;
use PHPMVC\lib\Saas\SaasHelper;
use PHPMVC\lib\Template;


session_start();
if(!defined('DS')){
    define('DS',DIRECTORY_SEPARATOR);
}
require_once '..'.DS.'app'.DS.'config'.DS.'config.php';
require_once APP_PATH.DS.'lib'.DS.'autoload.php';

if(!isset($_SESSION['lang'] )){
    $_SESSION['lang'] = APP_DEFAULT_LANGUAGE;   
   }

   (new Saas())->run($_SERVER['HTTP_HOST']);
   SaasHelper::handelHost('ahmedsamy');
   SaasHelper::generateDataBase('ahmedsamy');

$templateparts= require_once '..'.DS.'app'.DS.'config'.DS.'templateconfig.php';
$template= new Template($templateparts);
$language = new Language();

$controller= new  FrontController($template,$language);
$controller->dispatch() ;
