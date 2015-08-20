<?php
class acl {
    public $curSection;
    public $curPermission;
    public function __construct(){
       //init the  class
    }
    
   
   
   // le  credenziali sono  contenute nel  file  aclXML
  public function createCredentials($per){
    $per;
    $sxe = simplexml_load_file(FILENAME_ACL.".xml");
    foreach($sxe->module as $item) {
        $curModule=$item['Id_sez'];
        
        foreach ($item->group as $group) {
            if($group==$per){
                  $_SESSION['modules'][''.$curModule.'']=1;
            }
                         
        }
        foreach ($item->credentials->$per as $cred) {
             foreach ($cred->item as $item) {
              //printf("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cread: %s\n", $item."<br/>");
              $_SESSION['credentials'][''.$curModule.''][''.$item.'']=1;
              }
        }
    }
  }
  // utility che  stampa le variabili di sessione
  public  function readPermission(){
     print_r($_SESSION['modules']);
  }
  
  public  function readCredentials(){
     print_r($_SESSION['credentials']);
  }
  
  
  
  
  // verifico le  credenziali di un modulo
  public  function ckModulePermission($module){
    // $this->readPermission();
    
     if($_SESSION['modules'][$module]==1){
        return true;
     }
     else {
       return false;
     }
  }
  
  public  function ckPagePermission($module,$page,$IdOwner=''){
     $curOwner=$_SESSION['credentials'][$module]['isOwnerOnly'];
     $curPage=$_SESSION['credentials'][$module][$page];
     $allCred=$_SESSION['credentials'][$module]['all'];
     if($curPage==1 ||$allCred==1){
       if(String::ma_not_null($curOwner) && ma_not_null($IdOwner)){
         // se owner puo fare l'azione
      
         if($this->getOwner($IdOwner)==true){   
           return true;
         }
         else return false;
       }
        
       else return true;
     }
     else {
       return false;
     }
  }
  
  public  function ckActionPermission($module,$action,$IdOwner=''){
     $actionCred=$_SESSION['credentials'][$module][$action]; // credenziali action
     $allCred=$_SESSION['credentials'][$module]['all'];//  se tutte
     $curOwner=$_SESSION['credentials'][$module]['isOwnerOnly'];
     if($actionCred==1 || $allCred==1){
        if(String::ma_not_null($curOwner) && ma_not_null($IdOwner)){
         // se owner puo fare l'azione
      
         if($this->getOwner($IdOwner)==true){   
           return true;
         }
         else return false;
       }
        
       else return true;
     }
     else {
       return false;
     }
  }
  
  
  // verifico se  nelle  lista  il 
  public function hasOwner($module){
    if($_SESSION['credentials'][$module]['isOwnerOnly']){
       return true;
    }
    else return false;
  }
  

  
  
  public function getOwner($IdOwner){
  // se utente passato  e  uguale  a  quello si sessione  allora � un Owner
    if(ma_getParameter('uid')==$IdOwner){
        $this->isOwner=true;
    }
    else {
         $this->isOwner=false;
    }
    return  $this->isOwner;
  }
  
  public function isAdmin(){
  // se utente passato  e  uguale  a  quello si sessione  allora � un Owner
    if(ma_getParameter('Permission')=='admin' or ma_getParameter('Permission')=='su' or ma_getParameter('Permission')=='segreteria'){
        $this->isAdmin=true;
    }
    else {
         $this->isAdmin=false;
    }
    return  $this->isAdmin;
  }
  
  public function isReserved($Id_sez){
    if($this->ckActionPermission($Id_sez,'all')) {
        $this->isReserved=true;
		// se l'utente ha i diritti di leggere i riservati torno vero per  cui non metto la where Flagreserved=1
    }
    else {
         $this->isReserved=false;
		 //metto la where Flagreserved=1
    }
	$this->isReserved;
    return  $this->isReserved;
  }
}
?>
