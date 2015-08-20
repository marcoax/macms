<?php
session_start();
$isRemote=1;
// Configurazione generale
include_once('../../config/configure.php');
require_once(DIR_FS_INCLUDES.'common_include.inc.php');
require_once(DIR_FS_APPLICATION_CLASS.'emailHandler.class.php');


$result  = array();
$result['msg']    ='';
$result['status'] ='KO';
$result['data']   ='';


$app = new \Slim\Slim();
$app->isDebba   =0;
$app->mainTab   = ($app->request()->get('mainTab'));
$app->campo     = ($app->request()->get('campo'));
$app->email     = ($app->request()->get('email'));
$app->dammyType = ($app->request()->get('dammyType'));	
$app->stringa=($app->request()->post('stringa'));	



//  valido login  utente	
$app->get('/validate/:name', 'validate');
function validate($name) {
   global $app;
   if($name=='login'){

		    $email = filter_var(ma_getParameter('email'), FILTER_SANITIZE_EMAIL);  
   			$pwd = ma_getParameter('password'); 
   			if (filter_var($email, FILTER_VALIDATE_EMAIL) && ma_not_null($pwd)) {
   				$objUser=new user();
				$objUser->ckUserByEmail($email,$pwd);
				if($objUser->Data){
                   if($objUser->Data->Disable!=0){
        	 		   $result['msg']=MSG_ERROR_LOGIN_NON_ATTIVO;
			 		   $result['status']='KO';    
             	   }
				   else {
                  		 //$objUser->ma_session_setLogin($objUser->Data,ma_getParameter('rememberme'));
                   		 $result['msg']='';
			 	   		 $result['status']='OK';
						 $result['data']=$objUser->setJson($objUser->Data);// estraggo  solo i  campi  utili per  il  json
			       }
          		}
				else {
        	 		$result['msg']=MSG_ERROR_LOGIN;
			 		$result['status']='KO';    
             	}
            }
			else {
        	 	$result['msg']=MSG_ERROR_LOGIN;
			 	$result['status']='KO'; 
             }
    }
	
	
	if($name == 'subscribeNotify' ){
		$app->email=$app->request()->get('emailSub');
		$email = filter_var($app->email, FILTER_SANITIZE_EMAIL);  
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			
			$objN=new newslettertracker();
			$objN->_ma_update_Tracker('',1,$email);
		
			simple_mail('Nuova Richiesta','E\' stata inviata una nuova  richiesta da '.$email);
		 	$result['msg']    = MSG_THANK_SUBSCRIBE_NOTIFY;
		 	$result['status'] ='OK'; 
		  
			} else {  
		   		$result['msg']    = MSG_ERROR_EMAIL_INVALID;
				$result['status'] ='KO';  
		}  
	}
	elseif($name == 'newsletter' ){
		$email     = filter_var(ma_getParameter('email'), FILTER_SANITIZE_EMAIL);  
		if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$objNU = new  newsletteruser();
			if($objNU->getUserByEmail($email))$result['msg'] = MSG_ERROR_EMAIL_PRESENT;
			else { $objNU->registerUser();
				$result['msg']    = ( $objNU->msg )? $objNU->msg: MSG_ISCRIZIONE;
		        $result['status'] =' OK'; 
			}
		}
		else {
			$result['msg']    =  MSG_ERROR_EMAIL_INVALID;
			$result['status'] = 'KO';     
		}		
	}
   
   echo json_encode($result);
}

$app->run();
