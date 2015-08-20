<?php

class  anagraficautenti  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function anagraficautenti($hideFeItem=0,$hideExtraItem=0)
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
 					'size' =>615, 					'h' =>'',					'max' => 11, 					'pkey' => 'n', 					'required' => 'y', 					'hidden' => '1', 					'label'=>CL_IDUSER, 					'extraMsg'=>'', 					'display'=>'1', 					'devMsg'=>'Id utente', 					'json'=>'1'
									 
	);
	//Tipo utente / user, premium
 	
		//Email  usato  come username per il login
 	
	
	//Nome 
 	$fieldspec['Firstname']= array('type' =>'string',
 					'size' =>615, 					'h' =>'',
                    'cssclass' => 'span7',
                    					'max' => 50, 					'pkey' => 'n', 					'required' => 'y', 					'hidden' => $this->hideFeItem, 					'label'=> CL_NAME, 					'extraMsg'=>'', 					'display'=>'1', 					'devMsg'=>'Nome', 					'json'=>'1',
	);
	
	//Cognome 
 	$fieldspec['Surname']= array('type' =>'string',
 					'size' =>615, 					'h' =>'',
                    'cssclass' => 'span7',
                    					'max' => 50, 					'pkey' => 'n', 					'required' => 'y', 					'hidden' => $this->hideFeItem, 					'label'=> CL_SURNAME, 					'extraMsg'=>'', 					'display'=>'1', 					'devMsg'=>'Nome', 					'json'=>'1',
	);
	 $fieldspec['Professione']    = array('type' =>'string',                                          'size' => 600,										  'max' => 255,                                          'required' => '0',                                          'hidden' => '0',										   'extraMsg'=>'',										  'label'=>CL_PROFESSIONE,										  'display'=>'1',										  'json'=>'1',										         );
	
	
	 //username , non usato   si usa  email     $fieldspec['payer_email']= array('type' =>'string', 					'size' =>615, 					'h' =>'',					'max' => 100, 					'pkey' => 'n', 					'required' => 'y', 					'hidden' => $this->hideFeItem, 					'label'=>CL_EMAIL.' ', 					'extraMsg'=>'', 					'display'=>'1', 					'devMsg'=>'', 					'json'=>'1', 						);	 $fieldspec['Phone']    = array('type' =>'string',                                    'size' => 600,   								    'max' => 255,                                    'required' => '0',                                    'hidden' => '0',									'label'=>CL_PHONE,									'extraMsg'=>'',									'display'=>'1',									'devMsg'=>'', 					                'json'=>'1',    );		//Studio/azienda
 	$fieldspec['IdMarchi']    = array('type' =>'string',                                         'size' => 600,                                         'h'=>100,   									     'max' => 255,                                         'required' => '0',                                         'hidden' => '0',										  'label'=>CL_PAGE_TITLE_BRAND,										  'extraMsg'=>'',										  'combo'=>'categoryListTree',										  'multiple'=>0,										  'Domain'=>'marchi',										  'display'=>'1',										  'cssClass'=>'span7',										  'json'=>'1',       );	   $fieldspec['Img']    =array ('type' =>'media',  									 'size' =>300,   									 'max' => 255,									 'pkey' => 'n',									 'required' => 'n',									 'hidden' => '0',									 'label'=>CL_IMAGE,									 'extraMsg'=>'450x317',									 'display'=>'1',									 'readonly'=>'1',									 'mediaType'=>'Img',									 'extraMsgEnabled'=>'Code',									 'pathSuffix'=>$Id_sez,									 'json'=>1 		);
	//Codice iso nazione
 	$fieldspec['IdCountry']= array('type' =>'string',				'size' =>622,				'h' =>'',
                'cssclass' => 'span3',				'max' => 50,				'pkey' => 'n',				'required' => '0',				'hidden' => 1,				'label'=>CL_COUNTRY,				'extraMsg'=>'',				'display'=>'1',				'devMsg'=>'Codice iso nazione',				'combo'=>'Nazioni',   );

	//1 contatto pubblico
   $fieldspec['Pub']           = array('type' =>'boolean',   	                                        'size' =>1,  										    'max' => 1, 	                                        'pkey' => 'n',	                                        'required' => '',	                                        'hidden' => '0', 										    'label'=>CL_PUBLISH, 										    'json'=>1, 										    'display'=>'1',     );
	$fieldspec['flagReserved']      = array('type' =>'boolean',  	                                         'size' =>1,      									      'max' => 1,		                                       'pkey' => 'n',		                                       'required' => '',                                               'extraMsg'=>'',		                                       'hidden' => '0',											   'label'=>CL_RESERVED,											   'display'=>'1',											   'json'=>1        );			 
	$fieldspec['CreatedBy']  = array('type' => 'integer',                                      'size' => 50,                                      'autoinsert' => 'y',                                      'display' => '0',                                      'json'=>1 	  );      $fieldspec['dateCreation']  = array('type' => 'date',                                         'size' => 50,                                         'autoinsert' => 'y',                                         'display' =>'0',                                         'json'=>1 	  );      $fieldspec['lastUser']      = array('type' => 'integer',                                         'size' => 50,                                         'autoinsert' => 'y',                                         'display' => '0',										 'json'=>1       );     $fieldspec['LastModified']  = array('type' =>'timestamp',                                         'size' => 600,                                         'autoinsert' => 'y',                                         'display' => '0',										 'json'=>1 		);




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
	    $this->_ma_pre_getData();		$this->initWhere($this->suffix.".Disable=0" ); //and active='1' importante che  utente  non sia stato cancellato		if($username)$this->wObj->setEq('Email',$username);		if($pwd!='' && ENCODE_PWD==1)$this->wObj->setEq('Pwd',encPwd($pwd));		else if($pwd!='')$this->wObj->setEq('Pwd',$pwd);		$this->getData(2);		return $this->Data;    }
	
	
	
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
		$_SESSION['uid']=$_SESSION['IdUser']; //  creou uid  dell'utente;
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
    
   function getUserByEmail($email){     $this->_ma_pre_getData();	 $this->initWhere('Email="'.$email.'"');	 $this->getData(2);	 if($this->Data) return $this->Data;	 else return false;   }
   
	
	function  createUser(){	  	$this->Data->Firstname=ma_getParameter('nomePre');		$this->Data->Surname=ma_getParameter('cognomePre');	  	$this->Data->Email=ma_getParameter('emailPre');		$this->Data->pwd=ma_getParameter('pwdPre');		$this->Data->Lang=ma_getParameter('langPre');		$this->Data->activationCode=$this->createCode($this->Data->Email,0,rand(2,6));		$this->Data->Timezone=($this->Data->Timezone)?$this->Data->Timezone:date_default_timezone_get();		$field='Username,IdTipo,Email,Pwd,Firstname,Surname,Company,Timezone,IdCountry,activationCode,Lang,dateCreation';		$placeHolder=':Username,:IdTipo,:Email,:Pwd,:Firstname,:Surname,:Company,:Timezone,:IdCountry,:activationCode,:Lang,NOW()';		//$this->insertIteIdTipom		$data = array( 'Username' => '', 		               'IdTipo' => 'user', 		               'Email' => $this->Data->Email,		               'Pwd' => $this->Data->pwd, 		               'Firstname' => $this->Data->Firstname,		               'Surname' => $this->Data->Surname, 		               'Company' => $this->Data->Company,		               'Timezone'=>$this->Data->Timezone,		               'IdCountry'=>$this->Data->IdCountry,  		               'activationCode' => $this->Data->activationCode,		               'Lang' => $this->Data->Lang
 	    );  
        
		$this->curIdUser=$this->insertnewItem($field,$placeHolder,$data);
		// notify
		
		if((int)$this->curIdUser){ 			$data=$this->Data;
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