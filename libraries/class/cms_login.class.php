<?php
   class cms_login extends smile_login{
    
    public function __construct(){
       //init the  class
    }
      
   
   

    
    //  qui  setto  tutte le  variabili di  sessione 
    public function _setSession($data){
    	
    	 while (list($k, $v) = each($data) ){
			$_SESSION[$k]=stripslashes($v);
		}
		$this->_moduleHandler($_SESSION['LOGIN_CO']);
		
		//echo APPLICATION_ACL;
		if(APPLICATION_ACL!='')   {
			
		    	if($_SESSION['modules']['AB_ADMINSMIPASS']==1) {
		    		 $_SESSION['logged']=1;
		             $_SESSION['loggedCms']=1;
		    	}
				else {
					 ma_session_destroy();
					 $_SESSION['logged']=0;
		             $_SESSION['loggedCms']=0;
					 $this->ErrorMsg=MSG_ERROR_LOGIN_NON_ATTIVO;
				}
		}
		else {
			 $_SESSION['logged']=1;
		     $_SESSION['loggedCms']=1;
		}
		
		// wrapper  function to keep  the  same   value
		$_SESSION['uid'] =1;
	    $_SESSION['username']= $_SESSION['LOGIN_CO'];
	    $_SESSION['NomeUtente']=$_SESSION['NOME_DE'];
		$_SESSION['showLang']=1;	
		$_SESSION['lang']=($_SESSION['LNG_CO']=='I')?'it':'en';
		
		
			
    }
 
     //  crea  le  variabili di sessione  per  tutti i  moduli   abilitati all'utenet
    //  crea  le  variabili di sessione  per  tutti i  moduli   abilitati all'utenet
    private function _moduleHandler($login_co){
        if(String::ma_not_null($_SESSION['LOGIN_CO'])) {
        	$objRel=smile_ta_relazioni::getUserRelation('AB_ACLSW',$_SESSION['LOGIN_CO']);
			if($objRel){
				
				foreach($objRel as $d) {
					$_SESSION['modules'][$d->IDOBJECTA_CO]=1;

				}
			}
        }
    }
	
	  // le  credenziali sono  contenute nel  file  aclXML
   private function _setCredentials(){
    //$oc = new acl();
    //$oc->createCredentials($_SESSION['Permission']);
  }
    
 
}
?>