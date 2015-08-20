<?php

class Login{
  function Login($obj,$ok){
	 $this->_userID=$obj->IdUser;// id utente  che  si loggo
	 $this->_NomeUtente=$obj->Firstname." ".$obj->Surname;
	 $this->_username=$obj->Username;
	 $this->_Permission=$obj->IdProfilo;
     $this->_anagrafica=$obj->anagrafica;
	 $this->_IdAzienda=$obj->IdAzienda;
	 $this->_langcode=$obj->Lang;
	 $this->_logged=$ok;
	 $this->_IdStatus=$obj->IdStatus;
	 $this->_backEnd=1;
     $this->_Email=$obj->Email;
   }
 
  // ceck is  the user  is  present
  function _initLogin() {
     $username 	= ma_db_sanitize_sqlj($_REQUEST[TABLE_ADMIN_USER.'_Username']);
	 $pwd		= ma_db_sanitize_sqlj($_REQUEST[TABLE_ADMIN_USER.'_pwd']);
	 $objUser	= new user;
	 $objUser->debug = 0;
	 $objUser->ckUser( $username,$pwd );
	 if ( $objUser->Data ){return new Login( $objUser->Data,1 );}
	 else {return new Login($objUser->Data,0);}
  }
 
 //  qui  setto  tutte le  variabili di  sessione 
 function _setSession(){
     $_SESSION['uid'] = $this->_userID;
	 $_SESSION['username'] = htmlspecialchars($this->_username);
	 $_SESSION['loggedCms'] = true;
	 $_SESSION['NomeUtente']=$this->_NomeUtente;
	 $_SESSION['isAdmin'] = ($this->_Permission=='admin' ||$this->_Permission=='su')?true:false;
     $_SESSION['Permission'] =$this->_Permission;
	 $_SESSION['logged']=$this->_logged;
     $_SESSION['langcode']=$this->_langcode;
     $_SESSION['IdAzienda']=$this->_IdAzienda;
	 $_SESSION['IdStatus']=$this->_IdStatus;
     $_SESSION['Email']=$this->_Email;
	 $_SESSION['backEnd']=$this->_backEnd;
  }
   
   
  // function set Last Access
  function _lastAccess(){
    user::updateAcces($_SESSION['uid']);
   
  }
   
  function _destroySession(){
     $this->_logged=0;
	 ma_session_destroy();
  }
  
  // le  credenziali sono  contenute nel  file  aclXML
  function _setCredentials(){
    //$oc = new acl();
    //$oc->createCredentials($_SESSION['Permission']);
  }
}
