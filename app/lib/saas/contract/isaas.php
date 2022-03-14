<?php 
namespace PHPMVC\lib\Saas\Contract;
interface Isaas
{
   public function run ($subDomain);
   public function getDomain($subDomain);
   public function setDomain($SubDomain);
}