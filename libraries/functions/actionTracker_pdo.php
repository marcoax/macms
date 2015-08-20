<?php  

$curPage=ma_get_page();
if($queryMode)$actionTypeMode=$queryMode;
else{
     $actionTypeMode=($actionTypeMode)?$actionTypeMode:$curPage;
     if($curPage=='home'){
         $actionTypeMode='view';
         $Id_sez='bacheca';
     }
 }
$IdAzione=($IdAzione)?$IdAzione:ma_getParameter($mainTab."_IdAzione");
include_once(DIR_FS_FUNCTIONS."actionTrackerHelper.php");
//*********************init  the notifier*************************
                                   //notofico solo  se l'oggetto  non � draft
 if($queryOk==1 and $queryMode and $objNotify!=1){
    $actionTypeMode=ACTION_NOTIFY.$queryMode;
     
    $objUser= new user();
	$ObjUserList= new usertoaction();
    $ObjUserList->setDomain('azioni');
   
    //*************************  start the notifier ********************
    $objTracker->initNotifier();
    $objTracker->setActionType($actionTypeMode);
    $countItem=$objTracker->checkActionExist();
    //****************  check if  the  action was  already notified
    if($countItem <1 ){
    
             switch($Id_sez){
              case'user':
                 $actionSubject="Utente";
        		 $actionMessage="L' utente ".$titoloItem;
        		 $objUser->getNotifyAdminList();
        	  break;
        	  case'azioni':
                 $actionSubject="Azione";
        		 $actionMessage="".$titoloItem;
        		 $objUser->getNotifyAdminList();
        		 
        		 $ObjUserList->getUserByAction($Id);
                 $ObjUserList->getData();
              break;
        	  case'evento':
                 $actionSubject="Evento";
        		 $actionMessage="".$titoloItem;
        		 $objUser->getNotifyAdminList();
        		 $ObjUserList->getUserByAction($IdAzione);
                 $ObjUserList->getData();
        		
        		 
              break;
        	    case'documenti':
                 $actionSubject="Documento";
        		 $actionMessage="".$titoloItem;
        		 $objUser->getNotifyAdminList();
        		 $ObjUserList->getUserByAction($IdAzione);
                 $ObjUserList->getData();
        	  break;
        	}
        	
        	$actionMode=($queryMode=='insert')?'Inserimento':'Modifica';
        	$messageMode=($queryMode=='insert')?MSG_EMAIL_SUB_INSERT:MSG_EMAIL_SUB_MODIFY;
        	$subject=CMS_EMAIL_FROMNAME." - ".$actionMode.' '.$actionSubject; 
        	$objTracker->objEmail->setSubject($subject);
            
        	//$objUser->debugQ();
        	//$ObjUserList->debugQ();
        	if($objUser->Data){
        		foreach($objUser->Data as $dati){
        		    $dati->Descrizione=sprintf($messageMode,$actionMessage,ma_getParameter('NomeUtente'));
        	    	$objTracker->objEmail->prepareEmail($dati);
        			if(EMAIL_NOTIFY_FLAG){
					  $objTracker->objEmail->sendMsg($dati->Email,$dati->Username);
					  if(String::ma_not_null($dati->Email2))$objTracker->objEmail->sendMsg($dati->Email2,$dati->Username);
					}  
        	    }
        		
        	}
        	if($ObjUserList->Data){
        		foreach($ObjUserList->Data as $dati){
        		    $dati->Descrizione=sprintf($messageMode,$actionMessage,ma_getParameter('NomeUtente'));
        	    	$objTracker->objEmail->prepareEmail($dati);
        			if(EMAIL_NOTIFY_FLAG){
					  $objTracker->objEmail->sendMsg($dati->Email,$dati->Username);
					  if(String::ma_not_null($dati->Email2))$objTracker->objEmail->sendMsg($dati->Email2,$dati->Username);
					} 
        	    }
        	}
            //if  all is  ok  upadate  the notifier
            $objTracker->setPageTitle($subject);
            $objTracker->updateTracker();//**** tracker update ************/
      }
}
?> 
