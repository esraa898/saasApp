<?php 
namespace PHPMVC\lib;

class Language 
{
    private $dictionary=[];
public function load($path){
   $deafultlanguagepath= APP_DEFAULT_LANGUAGE;
   if(isset($_SESSION['lang'])){
    $deafultlanguagepath=$_SESSION['lang'];
  }
   $patharray=explode('.',$path);
   $languagepathfile= LANGUAGE_PATH.$deafultlanguagepath.DS.$patharray[0].DS.$patharray[1].'.lang.php' ;

    if(file_exists($languagepathfile)){
        require_once $languagepathfile;
        if(is_array($_)&& !empty($_)){
        foreach($_ as $key => $value){

         $this->dictionary[$key]=$value;
        }}
    }else{
        trigger_error('sorry languge file dose\'t exist',E_USER_WARNING);
}

}
 public function getDictionary(){
    return $this->dictionary;
 }

}