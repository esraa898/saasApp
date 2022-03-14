<?php 
namespace PHPMVC\lib\Saas;

use PHPMVC\lib\Saas\Contract\Isaas;
use PHPMVC\Model\UserModel;
use PHPMVC\Model\VcardModel;

class Saas implements Isaas
{

    public function run($subDomain){
    
      $subDomain_database=  $this->getDomain($subDomain);
        $this->setDomain( $subDomain_database);
        
    }
   public function getDomain($SubDomain)
   {
      
   $dp= VcardModel::getByPk($SubDomain,'*');
   if(!empty($dp)){
       return $dp->database_user;
   }
   return false;
   }

   public function setDomain($subDomain)
   {
       
        return    UserModel::$dbname = $subDomain;
           

   }


}