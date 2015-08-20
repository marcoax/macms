<?php class  user  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function user()
    {
        $this->tablename = TABLE_ADMIN_USER;        $this->suffix= 'au';        $this->commonQuery();        $this->fieldspec = $this->getFieldSpec_original();    } // template
    // ****************************************************************************
    function getFieldSpec_original ()
    // set the specifications for this database table
    {
        $this->primary_key      = array();        $this->unique_keys      = array();        $this->child_relations  = array();        $this->parent_relations = array();        // build array of field specifications        $fieldspec['IdUser']    =array('type' => 'integer',                                             'size' => 5,                                             'pkey' => 'y',                                             'required' => 'y',                                             'hidden' => '1',											 'label'=>'Id',											 'display'=>'1',											 'json'=>'1'
       );	   $fieldspec['IdProfilo']    = array('type' =>'string',                                          'size' => 400,										  'max' => 255,                                          'required' => '1',                                          'hidden' => '0',										  'label'=>CL_PROFILE,										  'extraMsg'=>'',										  'combo'=>'Permission',										  'display'=>'1',										  'json'=>'1'       );       $fieldspec['Firstname']    = array('type' =>'string',                                            'size' => 600,										    'max' => 255,                                            'required' => 'y',                                            'hidden' => '0',										    'label'=>CL_NAME,										    'extraMsg'=>'',										    'display'=>'1',										    'json'=>'1'
       );       $fieldspec['Surname']    =array('type' =>'string',                                       'size' => 600,									   'max' => 255,                                       'required' => 'y',                                       'hidden' => '0',     								   'label'=>CL_SURNAME,									   'extraMsg'=>'',									   'display'=>'1',									   'json'=>'1'       );   
       $fieldspec['Email']    = array('type' =>'string',                                      'size' => 600, 									  'max' => 255,                                      'required' => 'y',                                      'hidden' => '0',     								  'label'=>CL_EMAIL,									  'extraMsg'=>'',    								  'display'=>'1',    								  'json'=>'1'
       );
	   $fieldspec['Username']    = array('type' =>'string',                                          'size' => 600,										  'max' => 255,                                          'required' => 'y',                                          'hidden' => '0',										  'label'=>CL_USERNAME,										  'extraMsg'=>'',										  'display'=>'1'
       );       $fieldspec['Pwd']    = array('type' =>'string',                                    'size' => 600,      		     					'max' => 255,                                    'required' => 'y',                                    'hidden' => '0',									'label'=>CL_Pwd,									'extraMsg'=>'',									'display'=>'1',                                    'combo'=>'PwdHandler',
       );                     //Codice attivazione 	  $fieldspec['activationCode']= array('type' =>'string', 					'size' =>615, 					'h' =>'',					'max' => 255, 					'pkey' => 'n', 					'required' => '0', 					'hidden' => '1', 					'label'=>CL_ACTIVATIONCODE, 					'extraMsg'=>'', 					'display'=>'1', 					'devMsg'=>'Codice attivazione', 					'json'=>'1'      );
       
       $fieldspec['Phone']    = array('type' =>'string',                                          'size' => 600,										  'max' => 255, 										  'required' => '0',                                          'hidden' => '1',										  'label'=>CL_PHONE,										  'extraMsg'=>'',										  'display'=>'1'        );
       
       $fieldspec['Fax']    = array('type' =>'string',                                          'size' => 600,										  'max' => 255,                                         'required' => '0',                                          'hidden' => '1',										  'label'=>CL_FAX,										  'extraMsg'=>'',										  'display'=>'1'      );

    
       
	   $fieldspec['Mobile']    =array('type' =>'string',                                          'size' => 600,										  'max' => 255,                                          'required' => '0',                                          'hidden' => '1',										  'label'=>CL_MOBILE,										  'extraMsg'=>'',										  'display'=>'1'      );      	    $fieldspec['Professione']    = array('type' =>'string',                                          'size' => 600,										  'max' => 255,                                          'required' => '0',                                          'hidden' => '0',										   'extraMsg'=>'',										  'label'=>CL_PROFESSIONE,										  'display'=>'1',										  'json'=>1,										  'jsonLabel'=>CL_PROFESSIONE, 										         );	   $fieldspec['Company']    = array('type' =>'string',                                          'size' => 600,										  'max' => 255,                                          'required' => '0',                                          'hidden' => '1',										  'label'=>CL_COMPANY.'/'.CL_ENTE,										  'extraMsg'=>'',										  'display'=>'1'       );
	
       $fieldspec['Address']    = array('type' =>'string',                                          'size' => 600,										  'max' => 255,                                          'required' => '0',		                                  'hidden' => '1',										  'label'=>CL_ADDRESS,										  'extraMsg'=>'',										  'display'=>'1'
      );     $fieldspec['Zipcode']    = array('type' =>'integer',                                      'size' =>50,     								  'max' => 10,                                      'required' => '0',                                      'hidden' => '1',     								  'label'=>CL_ZIP,									  'extraMsg'=>'',									  'display'=>'0'       );       $fieldspec['City']    =  array('type' =>'string',                                      'size' => 600,									  'max' => 255,                                      'required' => '0',                                      'hidden' => '1',									  'label'=>CL_CITY,									  'extraMsg'=>'',
										  'display'=>'1'
       );       $fieldspec['State']    = array('type' => 'integer',
                                        'size' => 600,
                                        'required' => 'y',
                                        'hidden' => '0',
										'display'=>'0',
										'label'=>'',
										'scombo'=>'Provincie',
       );
	   
	   
	    $fieldspec['IdRegione']    = array('type' => 'integer',
                                        'size' => 600,
                                        'required' => 'y',
                                        'hidden' => '1',
										'display'=>'1',
										'label'=>'',
										'combo'=>'Zone',
       );
      
        $fieldspec['IdCountry']  = array('type' =>'integer',	                                    'size' =>400,										 'max' => 255,                                          'required' => '0',                                          'hidden' => '0',										  'label'=>CL_COUNTRY,										  'extraMsg'=>'',										  'display'=>'1',								   	      'default_value'=>'50',								   	      'combo'=>'Nazioni',								   	      'cssClass'=>'span7',								   	      'json'=>1,										  'jsonLabel'=>CL_COUNTRY,        );										$fieldspec['IdMarchi']    = array('type' =>'string',                                         'size' => 600,                                         'h'=>100,   									     'max' => 255,                                         'required' => '0',                                         'hidden' => '1',                                         'label'=>CL_PAGE_TITLE_BRAND,                                         'extraMsg'=>'',										 'combo'=>'categoryListTree',										 'multiple'=>1,										 'Domain'=>'marchi',										 'display'=>'1',										 'cssClass'=>'span7',										 'hideSelectNull'=>1,										 'json'=>1                                   	    );						$fieldspec['IdAttivita']    = array('type' =>'string',                                          'size' => 600,                                          'h'=>300,										  'max' => 255,                                          'required' => '0',                                          'hidden' => '1',										  'label'=>CL_PAGE_TITLE_FOLDER,										  'combo'=>'categoryPageTree',										  'multiple'=>1,										  'Domain'=>'marchi',										  'display'=>'1',										  'cssClass'=>'span7',										  'hideSelectNull'=>1,										  'json'=>1                   );       	   $fieldspec['Img']    =array ('type' =>'media',  									 'size' =>300,   									 'max' => 255,									 'pkey' => 'n',									 'required' => 'n',									 'hidden' => '0',									 'label'=>CL_IMAGE,									 'extraMsg'=>'450x317',									 'display'=>'1',									 'readonly'=>'1',									 'mediaType'=>'Img',									 'extraMsgEnabled'=>'Code',									 'pathSuffix'=>'user',									 'json'=>1 		);
     	
	   $fieldspec['Lang']    = array('type' =>'string',
                                      'size' =>50,
									  'max' => 255,                                    
                                      'required' => '0',
                                      'hidden' => '1',
									  'label'=>CL_LANG,
									  'extraMsg'=>'',
									  'display'=>'1',
									  'default_value'=>'it'
      );
      
      $fieldspec['IdStatus']    = array('type' =>'string',
                                        'size' => 600,
										'max' => 255,
                                        'required' => '0',
                                        'hidden' => '0',
										'label'=>CL_STATUS,
										'extraMsg'=>'',
										'scombo'=>'Permission',
										'display'=>'0'
       );
       
       
      $fieldspec['FlagHtml']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>CL_FLAG_EMAIL_HTML,
											   'display'=>'1'
       );
	    $fieldspec['FlagNewsletter']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>CL_FLAG_NEWSLETTER,
											   'display'=>'1'
       );
	   
	     $fieldspec['FlagNotifica']           = array('type' =>'integer',		                                       'size' =>1,											   'max' => 1,		                                       'pkey' => 'n',		                                       'required' => '',		                                       'hidden' => '1',											   'label'=>CL_FLAG_NOTIFICA,											   'display'=>'1'
       );
       
       $fieldspec['Disable']    = array('type' =>'boolean',		                                       'size' =>1,											   'max' => 1,		                                       'pkey' => 'n',		                                       'required' => '',		                                       'hidden' => '0',											   'label'=>CL_DISABLE,											   'display'=>'1',											   'json'=>1 
       );   	  $fieldspec['CreatedBy']  = array('type' => 'integer',                                      'size' => 50,                                      'autoinsert' => 'y',                                      'display' => '0',                                      'json'=>1 	  );      $fieldspec['dateCreation']  = array('type' => 'date',                                         'size' => 50,                                         'autoinsert' => 'y',                                         'display' =>'0',                                         'json'=>1 	  );      $fieldspec['lastUser']      = array('type' => 'integer',                                         'size' => 50,                                         'autoinsert' => 'y',                                         'display' => '0',										 'json'=>1 
      );     $fieldspec['LastModified']  = array('type' =>'timestamp',                                         'size' => 600,                                         'autoinsert' => 'y',                                         'display' => '0',										 'json'=>1 	
	);
   // primary key details   $this->primary_key              = array('IdUser');   // unique key details   $this->unique_keys              = array('Email,Username');   // default sort sequence   $this->Order                    = $this->suffix.'.Username';   //$this->sa="IdDocumento";   $this->suggestField=" CONCAT(Firstname,' ', Surname) ";   $this->sa='IdUser';   $this->sb="Firstname";   $this->sc="Surname";   $this->sezTitle    = CL_PAGE_TITLE_USER;   $this->titoloItem="Firstname";   $this->hideLang  =1;   return $fieldspec;

  } // getFieldSpec_original

    // ****************************************************************************

    // ****************************************************************************
// ****************************************************************************

//  estrae  gli uetnti  non aasociati ad un azione o gruppo
   function getUserNotIn($IdActivity,$Dominio){     $this->_ma_pre_getData();	 $where="Select ".$this->primary_key[0]." 	         from ".TABLE_USER_TO_ACTION." 			 where IdActivity='".$IdActivity."' and Dominio='".$Dominio."'";	 $this->initWhere('IdUser not in ('.$where.')');     $this->wObj->setEq($this->suffix.".Disable","0");
   }
   
   function getUserByEmail($email){     $this->_ma_pre_getData();	 $this->initWhere('Email="'.$email.'"');	 $this->getData(2);	 if($this->Data) return $this->Data;	 else return false;
   }
   function getUserByUsername($username){	     $this->_ma_pre_getData();		 $this->initWhere('Username="'.$username.'"');		 $this->getData(2);		 if($this->Data) return $this->Data;		 else return false;   }
    function getFastUserByAc($ac){   	     $user=new user;	     $user->_ma_pre_getData();		 $user->initWhere('activationCode="'.$ac.'"');		 $user->getData(2);		 if($user->Data) return $user->Data;		 else return false;   }	
   //  spedisce l'email con la Pwd
	 function  sendPwd($email){
	  
	  if(!check_email_address($email)) return $msg=MSG_ERROR_EMAIL_INVALID;		  $this->getUserByEmail($email);		  if($this->Data){		  	$password=$this->generatePassword();			if(ENCODE_PWD==1)$this->Pwd=encPwd($password);			else $this->Pwd=$password;			$this->updatePwd();		  	$data=$this->Data;		 	$data->Pwd=$password;		 		$objEmail= new emailHandler();			$objEmail->isHTML=1;			$objEmail->mailerObj->Subject=WEBSITE_NAME.' - '.EMAIL_NOTYFY_SUBJECT;			$objEmail->setTemplate('sendPwd');			$objEmail->prepareEmail($data);			$objEmail->sendMsg($email,$data->Username);    		if(MODE=='debug')$objEmail->sendMsg(EMAIL_WEBMASTER,WEBSITE_NAME); 			if($objEmail->erroMsg)$msg=$objEmail->erroMsg;			else $msg=MSG_HELP_PWD_INVIATA;	  }
	  else $msg=MSG_HELP_EMAIL_NON_PRESENTE; 	  return $msg;	} 

	 function generatePassword($length = 8){	    	// start with a blank password			$password = "";			// define possible characters
			$possible = "0123456789bcdfghjkmnpqrstvwxyz-!?";			// set up a counter			$i = 0;			// add random characters to $password until $length is reached			while ($i < $length) {				// pick a random character from the possible ones				$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);				// we don't want this character if it's already in the password				if (!strstr($password, $char)) {					$password .= $char;					$i++;				}			}			// done!			return $password; 	 }
	
    function updatePwd(){
	   $q="UPDATE ".$this->tab." 		   SET  Pwd= '".addslashes($this->Pwd)."' 		   WHERE ".$this->primary_key[0]." = '".$this->Data->IdUser."'";	   $this->db->query($q);
	}   
   function getNotifyAdminList(){     $this->_ma_pre_getData();	 $this->initWhere('FlagNotifica="1" and Disable=0 and IdProfilo in(\'admin\',\'su\') ');	 $this->getData();	 return $this->Data;   }
   
    function ckUser($username,$pwd){	    $this->_ma_pre_getData();		$this->initWhere($this->suffix.".Disable=0" ); //and active='1' importante che  utente  non sia stato cancellato		if($username)$this->wObj->setEq('Username',$username);		if($pwd && ENCODE_PWD==1)$this->wObj->setEq('Pwd',encPwd($pwd));		else if($pwd)$this->wObj->setEq('Pwd',$pwd);		$this->getData(2);		return $this->Data;
   }			function ckUserByEmail($email,$pwd){	    $this->_ma_pre_getData();		$this->initWhere($this->suffix.".Disable=0" ); //and active='1' importante che  utente  non sia stato cancellato		if($email)$this->wObj->setEq('Email',$email);		if($pwd && ENCODE_PWD==1)$this->wObj->setEq('Pwd',encPwd($pwd));		else if($pwd)$this->wObj->setEq('Pwd',$pwd);		$this->getData(2);		return $this->Data;   }   function getUserById($id) { 	      $user=new user(); 	      $user->_ma_pre_getData($id);	      $d=$user->getData(2);	      return $CurUserName=stripslashes($d->Firstname.' '.$d->Surname);   }   function getUserProfileById($id) { 	      $user=new user();		   	      $user->_ma_pre_getData($id);	      $d=$user->getData(2);	      return $d;   }
	 
	 function updateAcces($uid) { 	      $user=new user(); 	      $user->tab=$user->tablename;		  $user->curField='lastAccess';          $q="UPDATE ".$user->tablename."        	      SET  ".$user->curField."= 'now()',               lastUser='".ma_getParameter('uid')."'		 WHERE ".$user->primary_key[0]." = '".$id."'";		 $user->execute($q); 	}	function setActivetionCode($id,$update=1){		$this->Data->activationCode=$this->createCode($this->Data->Email,0,rand(2,6));		if($update==1) {		    $q="UPDATE ".$this->tablename."        	       SET  activationCode= '".$this->Data->activationCode."'                WHERE ".$this->primary_key[0]." = '".$id."'";		       $this->execute($q); 		}		return $this->Data->activationCode;	}		 // questo metodo  ritorna la lista degli utenti per una determinato  subfolders   function getUserByAction($IdActivity,$IdUser=0){   		$this->_ma_getList();		// solo utenti e  associazioni non cancellate		$this->initWhere($this->suffix.".Disable=0 ");        if($IdActivity)$this->wObj->setF_I_S("IdAttivita",$IdActivity);		if($IdUser)$this->wObj->setEq("u.IdUser",$IdUser);		$this->debug=0;			  }    function getUserByActionNotIn($IdActivity,$IdUser=0){   		$this->_ma_getList();		// solo utenti e  associazioni non cancellate		$this->initWhere($this->suffix.".Disable=0 ");        if($IdActivity)$this->wObj->setF_I_S("IdAttivita",$IdActivity);		if($IdUser)$this->wObj->setEq("u.IdUser",$IdUser);		$this->debug=0;			  }     // questo metodo  ritorna la lista degli utenti per una determinata azione o gruppo   function getUserByActionType($IdActivity,$IdUser=0,$activityType='IdTodoList'){   		$this->_ma_getList();		// solo utenti e  associazioni non cancellate		$this->initWhere($this->suffix.".Disable=0 ");        if($IdActivity)$this->wObj->setF_I_S($activityType,$IdActivity);		if($IdUser)$this->wObj->setEq("u.IdUser",$IdUser);		$this->debug=0;	   }        	
} ?>