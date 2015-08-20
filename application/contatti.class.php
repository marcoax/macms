<?php

class  contatti  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function contatti($hideFeItem=0,$hideExtraItem=0)
    {
        $this->tablename= TABLE_ANAGRAFICAUTENTI;
        $this->suffix= TABLE_ANAGRAFICAUTENTI;
        $this->commonQuery();
		$this->hideFeItem=$hideFeItem;
		$this->hideExtraItem=$hideExtraItem;
        $this->fieldspec = $this->getFieldSpec_original();

    } // template
    // ****************************************************************************
    function getFieldSpec_original ()
    // set the specifications for this database table
    {
        $this->primary_key      = array();
        $this->unique_keys      = array();
        $this->child_relations  = array();
        $this->parent_relations = array();
		global $Id_sub;
        global $Id_sez;

    //Id utente
 	$fieldspec['Id']= array('type' =>'string',
 					'size' =>615,
									 
	);
	//Tipo utente / user, premium
 	
		//Email  usato  come username per il login
 	
	
	//Nome 
 	$fieldspec['Firstname']= array('type' =>'string',
 					'size' =>615,
                    'cssclass' => 'span7',
                    
	);
	
	//Cognome 
 	$fieldspec['Surname']= array('type' =>'string',
 					'size' =>615,
                    'cssclass' => 'span7',
                    
	);
	 $fieldspec['Professione']    = array('type' =>'string',
	 
	//username , non usato   si usa  email
	
	//Studio/azienda
	
	$fieldspec['Company']    = array('type' =>'string',
                                    'size' => 600,
   								    'max' => 255,
                                    'required' => '0',
                                    'hidden' => '0',
									'label'=>CL_COMPANY,
									'display'=>'1',
									'devMsg'=>'',
 					                'json'=>'1',

    );
	
	
	 $fieldspec['Phone2']    = array('type' =>'string',
                                    'size' => 600,
   								    'max' => 255,
                                    'required' => '0',
                                    'hidden' => '0',
									'label'=>CL_MOBILE,
									'extraMsg'=>'',
									'display'=>'1',
									'devMsg'=>'',
 					                'json'=>'1',

      );
	  
	  $fieldspec['Venues']    = array('type' =>'string',
                                    'size' => 600,
   								    'max' => 255,
                                    'required' => '0',
                                    'hidden' => '0',
									'label'=>CL_VENUES,
									'extraMsg'=>'',
									'display'=>'1',
									'devMsg'=>'',
 					                'json'=>'1',

    );
 	
	//Codice iso nazione
 	$fieldspec['IdCountry']= array('type' =>'string',
                'cssclass' => 'span3',

	//1 contatto pubblico
   $fieldspec['Pub']           = array('type' =>'boolean',
	$fieldspec['flagReserved']      = array('type' =>'boolean',
	 $fieldspec['dateCreation']  = array('type' => 'date',




        // primary key details
        $this->primary_key              = array('Id');
        // unique key details
        $this->unique_keys              = array('Firstname');
        // default sort sequence
        $this->Order              = $this->suffix.'.dateCreation  Desc ';
        $this->addField          = "'Firstname','Company'";
        $this->searchField       = "Firstname,Company";
		$this->sa           = $this->suffix.'.Id';
        $this->sb           = $this->suffix.'.Firstname';
		$this->a            = $this->suffix.'.Id';
        $this->b            = $this->suffix.'.Firstname';
        $this->b            = $this->suffix.'.Firstname';
		$this->sezTitle    = CL_PAGE_TITLE_ANAGRAFICAUTENTI;
		$this->feTitle=CL_YOUR_PROFILE;
        return $fieldspec;

    } // getFieldSpec_original

    function ckUser($username,$pwd=''){
	    $this->_ma_pre_getData();
	
	
	
	//++++++  attivo l'utente ************************/
	function activateUser($activationKey){
		
		$q="UPDATE ".$this->tablename." 
	    SET  Stato= '1' 
        WHERE activationCode = '".$activationKey."'";
	    return $this->execute($q);
		

	}
	
	
	// setto i parametri  di sessione
	function ma_session_setLogin($xmlData,$rememberme=0){
		$this->rememberme=$rememberme;
  		if($xmlData) {
    		//ma_session_destroy();
    		while (list($key, $val) = each($xmlData)){
         	 	session_register($key);
				$_SESSION[$key] = stripslashes($val);	
	   		}   
    	}
    	//  tipo dell'utente che si � loggato al  front  end
		session_register('loggatoFE');
		$_SESSION['loggatoFE'] = true;
		$_SESSION['displayName'] = $_SESSION['Firstname'].' '.$_SESSION['Surname'];
		$_SESSION['logged'] = 1;
		$_SESSION['uid']=$_SESSION['Id']; //  creou uid  dell'utente;
		$_SESSION['rememberme']=$this->rememberme; //  creou uid  dell'utente;
		$_SESSION['redir']='Y'; //  creou uid  dell'utente;
		$_SESSION['langSite']=$_SESSION['Lang'];
		//if($this->rememberme==1)$this->setRemember($xmlData);
   }
	
	
	function  setRemember($xmlData){
		
        $cookie_time = (3600 * 24 * 30); // 30 days
		$this->rememberme=$rememberme;
		
  	   	setcookie(APP_TITLE.'_Email',$xmlData->Email, $cookie_time);
		setcookie(APP_TITLE.'_Pwd',$xmlData->Pwd, $cookie_time);
		
     
   }
	
	
	
	
	
	
	 //  spedisce l'email con la Pwd
	 function  sendPwd($email){
	   if(!check_email_address($email)) return $msg=MSG_ERRORE_EMAIL_FORMAT;
	   $this->getUserByEmail($email);
	   if($this->Data){
	   	    $data=$this->Data;
	  		$objEmail= new emailHandler();
			$objEmail->isHTML=1;
			$objEmail->mailerObj->Subject=WEBSITE_NAME;
			$objEmail->getTemplateData(array('testoinviapassword'));
			$objEmail->prepareEmail($data);
			$objEmail->sendMsg($email,$data->Nome,0);
			if(DEBUG_MODE==1)$objEmail->sendMsg(EMAIL_WEBMASTER,WEBSITE_NAME);
			if($objEmail->erroMsg)$msg=$objEmail->erroMsg;
			else $msg=MSG_HELP_PWD_INVIATA;
	   }
	  else $msg=MSG_HELP_EMAIL_NON_PRESENTE; 
	 
	  return $msg;
	}
	 
	 //  spedisce l'email con la Pwd
	 function  sendPwdFull($email){
	  
	  if(!check_email_address($email)) return $msg=MSG_ERROR_EMAIL_INVALID;
	  $this->getUserByEmail($email);
	  if($this->Data){
	  	$password=$this->generatePassword();
		if(ENCODE_PWD==1)$this->Pwd=encPwd($password);
		else $this->Pwd=$password;
		$this->updatePwd();
	  	$data=$this->Data;
	 	$data->Pwd=$password;
 		$objEmail= new emailHandler();
		$objEmail->isHTML=1;
		$objEmail->mailerObj->Subject=WEBSITE_NAME.' - '.EMAIL_NOTYFY_SUBJECT;
		$objEmail->setTemplate('sendPwd');
		$objEmail->prepareEmail($data);
		$objEmail->sendMsg($email,$data->Username);
		if(MODE=='debug')$objEmail->sendMsg(EMAIL_WEBMASTER,WEBSITE_NAME);
		if($objEmail->erroMsg)$msg=$objEmail->erroMsg;
		else $msg=MSG_HELP_PWD_INVIATA;
		
	  }
	  else $msg=MSG_HELP_EMAIL_NON_PRESENTE; 
	 
	  return $msg;
	}  
    
   function getUserByEmail($email){
   
	
	function  createUser(){
 	    );  
        
		$this->curId=$this->insertnewItem($field,$placeHolder,$data);
		// notify
		
		if((int)$this->curId){ 
			$data->UrlStringa=DIR_WS_SITE.APP_ACTIVATION_PAGE.'?ac='.$this->Data->activationCode;//link attivazione;
	  		$objEmail= new emailHandler();
			$objEmail->isHTML=1;
			$objEmail->getTemplateData(array('testoattivazione'));
			$objEmail->prepareEmail($data);
			$objEmail->sendMsg($this->Data->Email,'',0);
			if(DEBUG_MODE==1)$objEmail->sendMsg(EMAIL_WEBMASTER,WEBSITE_NAME);
			if($objEmail->erroMsg)$msg=$objEmail->erroMsg;
			}
		
	}

   
	
		
// ****************************************************************************
} // end class
// ****************************************************************************
?>