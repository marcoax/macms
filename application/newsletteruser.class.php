<?php
class  newsletteruser  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function newsletteruser()
    {
        $this->tablename = TABLE_NEWSLETTERUSER;
        $this->suffix= 'nu';
        $this->commonQuery();
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

        // build array of field specifications
        $fieldspec['Id']    =array('type' => 'integer',
                                             'size' => 5,
                                             'pkey' => 'y',
                                             'required' => 'y',
                                             'hidden' => '1',
											 'label'=>'Id',
											 'display'=>'1',
											 'session'=>'1',
											 'xml'=>1
        );

        
		
       
	   
	   $fieldspec['Firstname']    = array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_NAME,
										  'extraMsg'=>'',
										  'display'=>'1',
										  'view'=>1,
										  'session'=>'1',
										  'xml'=>1
       );


        $fieldspec['Surname']    =array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>CL_SURNAME,
										  'extraMsg'=>'',
										  'display'=>'1',
										  'view'=>1,
										  'session'=>'1',
										  'xml'=>1
       );
       
       
	   
	   $fieldspec['dateBirth']  =array('type' => 'date',
                                      'size' =>100,
								      'max' => 255,
                                      'pkey' => 'n',
                                      'required' => 'y',
                                      'hidden' => '1',
									  'label'=>CL_DATE_OF_BIRTH,
									  'extraMsg'=>'Formato gg-mm-aaaa es. 21-12-2007',
									  'display'=>'1',
									  'view'=>1,
									  'session'=>'0',
									  'xml'=>0
        );
	  $fieldspec['Address']    = array('type' =>'string',
                                       'size' =>250,
									   'max' => 255,
                                       'required' => '0',
                                       'hidden' => '1',
									   'label'=>CL_ADDRESS,
									   'extraMsg'=>'',
									   'display'=>'1',
									   'view'=>1,
							   		   'session'=>'0',
									   'xml'=>1
       );
	   
	   $fieldspec['Num']    = array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          
                                          'required' => '0',
                                          'hidden' => '1',
										  'label'=>CL_NUMERO,
										  'extraMsg'=>'',
										  'display'=>'1'
       );


       $fieldspec['Zipcode']    = array('type' =>'integer',
                                          'size' =>50,
										  'max' => 10,
                                          
                                          'required' => '0',
                                          'hidden' => '1',
										  'label'=>CL_ZIP,
										  'extraMsg'=>'',
										  'display'=>'0'
       );


       $fieldspec['City']    =  array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'required' => '0',
                                          'hidden' => '1',
										  'label'=>CL_CITY,
										  'extraMsg'=>'',
										  'display'=>'1'
       );

      $fieldspec['State']    = array('type' => 'integer',
                                        'size' => 250,
                                        'required' => 'y',
                                        'hidden' => '1',
										'display'=>'0',
										'label'=>'',
										'scombo'=>'Provincie',
       );
	   
	   
	    $fieldspec['IdRegione']    = array('type' => 'integer',
                                        'size' => 250,
                                        'required' => 'y',
                                        'hidden' => '1',
										'display'=>'1',
										'label'=>'',
										'dcombo'=>'Zone',
       );
      
       $fieldspec['IdCountry']  = array('type' =>'integer',
                                          'size' =>50,
										  'max' => 255,
                                          
                                          'required' => '0',
                                          'hidden' => '1',
										  'label'=>CL_COUNTRY,
										  'extraMsg'=>'',
										  'display'=>'1',
								   	      'default_value'=>'50'
        );
       
       $fieldspec['Phone']    = array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          
                                          'required' => '0',
                                          'hidden' => '1',
										  'label'=>CL_PHONE,
										  'extraMsg'=>'',
										  'display'=>'1'
       );
	   
	   $fieldspec['Email']    = array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_EMAIL,
										  'extraMsg'=>'',
										  'display'=>'1',
										  'view'=>1,
										  'session'=>'1',
										  'xml'=>1
       );
	   
	    
	   
	    $fieldspec['Img']    = array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>CL_IMAGES,
										  'extraMsg'=>'',
										  'display'=>'1',
										  'view'=>1,
										  'session'=>'1',
										  'xml'=>0
       );
      
      $fieldspec['IdStatus']    = array('type' =>'boolean',
                                        'size' =>250,
										'max' => 255,
                                        'required' => '0',
                                        'hidden' => '0',
										'label'=>'Attivo',
										'extraMsg'=>'',
										'scombo'=>'userStatus',
										'display'=>'1',
										'view'=>0,
										'session'=>'1',
										'xml'=>1
       );
	   
	   $fieldspec['activationCode']    =array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '1',
										  'label'=>CL_ACTIVATION_KEY,
										  'extraMsg'=>'',
										  'display'=>'1',
										  'view'=>0,
										  'session'=>'1',
										  'xml'=>1
       );
	   
	   
       
	   $fieldspec['CreatedBy']  = array('type' => 'integer',
                                      'size' => 50,
                                      'autoinsert' => 'y',
                                      'display' => '0'
	  );

      $fieldspec['dataCreazione']  = array('type' => 'date',
                                         'size' => 50,
                                         'autoinsert' => 'y',
                                         'display' => '0',
										 'view'=>1,
										 'session'=>'0',
										 'xml'=>1
	  );
      $fieldspec['lastUser']      = array('type' => 'integer',
                                         'size' => 50,
                                         'autoinsert' => 'y',
                                         'display' => '0'
      );

     $fieldspec['LastModified']  = array('type' =>'timestamp',
                                         'size' => 250,
                                         'autoinsert' => 'y',
                                         'display' => '0'
	);
       
       
      
	  

	   // primary key details
	   $this->primary_key              = array('Id');
	   // unique key details
	   $this->unique_keys              = array('email,username');
	   // default sort sequence
	   $this->Order                    = $this->suffix.'.dataCreazione';
	   //$this->sa="IdDocumento";
	   $this->suggestField="username";
	 	
	   return $fieldspec;

  } // getFieldSpec_original

    // ****************************************************************************

    // ****************************************************************************
// ****************************************************************************

	function getUserByEmail($email){
	     $this->_ma_pre_getData();
		 $this->initWhere('Email="'.$email.'"');
		 $this->getData(2);
		 if($this->Data) return $this->Data;
		 else return false;
	}
	
	function getUserByUsername($username){
	     $this->_ma_pre_getData();
		 $this->initWhere('username="'.$username.'"');
		 $this->getData(2);
		 if($this->Data) return $this->Data;
		 else return false;
	}
	
	function getUserByActivationKey($activationKey){
	     $this->_ma_pre_getData();
		 $this->initWhere('activationCode="'.$activationKey.'"');
		 $this->getData(2);
		 if($this->Data) return $this->Data;
		 else return false;
	}
	
    
    function getUserByObject($id_object){
	     $this->_ma_pre_getData();
		 $this->initWhere('id_object="'.$id_object.'"');
		 $this->getData(2);
   		 if($this->Data) return $this->Data;
		 else return false;
	}
    
	//  spedisce l'email con la pwd
	 function  sendPwd($email){
	  
	  if(!check_email_address($email)) return $msg=MSG_ERROR_EMAIL_INVALID;
	  $this->getUserByEmail($email);
	  if($this->Data){
	  	$password=$this->generatePassword();
		$this->pwd=encPwd($password);
		$this->updatePwd();
	  	
	  	$data->Username=$this->Data->username;
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
	
	
	 function generatePassword($length = 8){
	    	// start with a blank password
			$password = "";
	
			// define possible characters
			$possible = "0123456789bcdfghjkmnpqrstvwxyz-!?";
	
			// set up a counter
			$i = 0;
	
			// add random characters to $password until $length is reached
			while ($i < $length) {
	
				// pick a random character from the possible ones
				$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
	
				// we don't want this character if it's already in the password
				if (!strstr($password, $char)) {
					$password .= $char;
					$i++;
				}
	
			}
	
			// done!
			return $password;
	 }
	
	 function updatePwd(){
	   $q="UPDATE ".$this->tab." 
		   SET  pwd= '".addslashes($this->pwd)."' 
		   WHERE ".$this->primary_key[0]." = '".$this->Data->id."'";
	   $this->db->query($q);
	 }
 
     
 
     // ck  is user  exists
	 function ckUser($fbuid){
	 	
		if(!ma_not_null($fbuid))return $this->errorHandlaer(1);
	 		$this->_ma_pre_getData();
		    $this->initWhere(1); //and active='1' importante che  utente  non sia stato cancellato
		    $this->wObj->setEq('fbuid',$fbuid);
		    $this->getData(2);
			return $this->Data;
	 } 
	 
	 
	 //  user registration
	 function registerUser(){
	 	//if(!ma_not_null($fbuid))return $this->errorHandlaer(1);
		if(String::ma_not_null(ma_getParameter('email'))){
		     //ma_session_destroy();
    		// faccio  insert  ned  database
      		//$fbuid=ma_getParameter('fbuid');
	  		$Surname=ma_getParameter('Surname');
	  		$Firstname=ma_getParameter('Firstname');
	  		$Address=ma_getParameter('Address');
	  		$Zipcode=ma_getParameter('Zipcode');
	  		$City=ma_getParameter('City');
	  		$State=ma_getParameter('State');
	  		$Num=ma_getParameter('Num');
	        $Phone=ma_getParameter('Phone');
      		$Email=ma_getParameter('email');
			//$EmailParent=ma_getParameter('EmailParent');
			$Img=ma_getParameter('Img');
			
	  		$dateBirth=ma_getParameter('dateBirth');
			$dateBirth=invDate::initInvDate($dateBirth);
	  		$dateCreation=date("Y-m-d");
	        
			$this->activationCode=$this->createCode($Email,0,rand(2,6));
				  
 			 // costruisco  la  query soorry
    		 $queryUser="INSERT
	              INTO ". $this->tablename."(
                     
					  Firstname , Surname , dateBirth,
					  Address , Zipcode , City ,
			          State ,Num,
                      Email,
					  Phone,
					  dataCreazione,
					  IdStatus,
					  Img,
					  activationCode
                  )
                  VALUES (
                     
					   '".addslashes($Firstname)."','".addslashes($Surname)."','".$dateBirth."', 
					   '".addslashes($Address)."' ,'".addslashes($Zipcode)."' ,
                       '".addslashes($City)."' ,'".$State."', '".addslashes($Num)."',
					   '".addslashes($Email)."',
					   '".$Phone."',
					   '".$dateCreation."',0,
					   '".$Img."',
					   '".$this->activationCode."'
				 )";
             ;
			 $dati->Firstname   = $Firstname;
			 $dati->Surname     = $Surname;
			 $dati->Email       = $Email;
			 $dati->EmailParent = $EmailParent;
			 $dati->Attivazione = DIR_WS_CATALOG.NEWSLETTER_ACTIVATION_PAGE.'&ac='.$this->activationCode;//link attivazione;
			 $this->msg         = '';
			 $this->notifyIscrizioneToUser($dati,'notifyRegistrazioneNewsletter',NEWSLETTER_NOTYFY_SUBJECT);
			 //if(String::ma_not_null($EmailParent))$this->notifyEmailToUser($dati,'notifyRegistrazioneParent',EMAIL_NOTYFY_PARENT_SUBJECT);
			 // se non  ci sono errori di invio	
			 //if($this->msg==''){
			 	$this->db->query($queryUser);
			 	$this->storeQuery($queryUser);
				
			//}// include(DIR_FS_BLOCKS."email_richiesta_informazioni.inc.php");  
          }
		  else return $this->errorHandlaer(1000);
		
		
	 }
	 
	 
	function createUserSessionData($fbuid){
		  $data=$this->ckUser($fbuid);
		  if($data){
		    $_SESSION['IdUser']=$data->Id;
		  	foreach ($data as $key => $val){
		  		if($this->fieldspec[$key]['session'])$_SESSION[$key]=$val;
				//if($this->fieldspec[$key]=='Id')
		  	}
			
		  }
          return $data;
	}
	
	function activateUser($activationKey){
		
		$q="UPDATE ".$this->tablename." 
	    SET  IdStatus= '1' 
        WHERE activationCode = '".$activationKey."'";
	 
	    return $this->db->query($q);
	}
	
	function removeUser($activationKey){
		
		$q="DELETE  from  ".$this->tablename." 
	        WHERE activationCode = '".$activationKey."'";
	 
	    return $this->db->query($q);
	}
	
	//    funzione  invio  email 
	function notifyEmailToUser($data,$template,$subject){
	   
	    $objEmail= new emailHandler();
  	    $objEmail->isHTML=1;
        echo $objEmail->mailerObj->From=CMS_EMAIL_FROM;
  		echo $objEmail->mailerObj->FromName = CMS_EMAIL_FROM ;
  		$objEmail->mailerObj->Subject=' '.$subject;
		
  		$objEmail->setTemplate($template);
  		$objEmail->prepareEmail($data);
		if($template=='notifyRegistrazioneParent') $objEmail->sendMsg($data->EmailParent,CMS_EMAIL_FROMNAME);
		else $objEmail->sendMsg($data->Email,CMS_EMAIL_FROMNAME);
		//if(ma_getParameter('debug')==1)$objEmail->sendMsg('marcoasperti@gmail.com',CMS_EMAIL_FROMNAME); //al momento mando anche a  me
		//echo $data->EmailParent;
		if($objEmail->erroMsg)$this->msg=$objEmail->erroMsg;
	}
	
	
	
	//  funzione  invio  email 
	function notifyIscrizioneToUser($data,$template,$subject){
	   
	    $objEmail= new emailHandler();
  	    $objEmail->isHTML=1;
        $objEmail->mailerObj->From= WEBSITE_EMAIL ;
  		$objEmail->mailerObj->FromName = utf8_decode( NEWSLETTER_FROM_NAME );
  		$objEmail->mailerObj->Subject=utf8_decode($subject);
		$objEmail->setTemplate($template);
		//$objEmail->msg_template_txt = implode("", file(EMAIL_NEWSLETTER_NOTYFY_TXT));
		$objEmail->msg_template_html = implode("", file( EMAIL_NEWSLETTER_NOTYFY_HTML ));
  		$objEmail->prepareEmail($data);
		$objEmail->sendMsg($data->Email,utf8_decode( NEWSLETTER_FROM_NAME ));
		//if(ma_getParameter('debug')==1)$objEmail->sendMsg('marcoasperti@gmail.com',CMS_EMAIL_FROMNAME); //al momento mando anche a  me
		//echo $data->EmailParent;
		if($objEmail->erroMsg)$this->msg=$objEmail->erroMsg;
	}
	
	
	function getIscritti($IdStatus=''){
	     $this->_ma_pre_getData();
		 if($IdStatus!='')$this->initWhere('IdStatus="'.$IdStatus.'"');
		 
	}
} 
?>