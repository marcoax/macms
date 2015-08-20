<?php
session_start();
// Configurazione generale
include('../../../config/configure.php');
require_once(DIR_FS_CMS_INCLUDES.'common_includes.inc.php');
require_once(DIR_FS_COMMONLIB_CLASSES.'browser_detection.php');
require_once(DIR_FS_COMMONLIB_CLASSES.'userTracker.class.php');

$result['msg']='';
$result['status']='KO';
$result['data']='';


$app = new \Slim\Slim();

$app->mainTab=($app->request()->get('mainTab'));
$app->campo=($app->request()->get('campo'));
$app->Id=ma_getParameter('Id');

$app->get('/validate/:name', 'validate');
 function validate ($name) {
	global $app;
	if($name=='login'){
   			echo  'sono  qui';

    }
	
	 
  	if($name=='ckUser'){
   			 $email = filter_var(ma_getParameter('mailpre'), FILTER_SANITIZE_EMAIL);  
   			 if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        	 	$objEmail=new anagraficautenti();
	        	$objEmail->ckUser($email);
		     	 if($objEmail->Data) {  
           				$result['status']='OK';
	       				$result['msg']=MSG_ERROR_EMAIL_PRESENT;
						$result['data']=$objEmail->Data;
        		}  
				 else  $result['status']='KO'; 
	      
   			} else {  
           		$result['msg']=MSG_ERRORE_EMAIL_FORMAT;
	       		$result['status']='KO';  
        	}  

    }
	if($name=='ckUserRelation'){
   			 $email = filter_var(ma_getParameter('mailpre'), FILTER_SANITIZE_EMAIL); 
		     $Id = ma_getParameter('Id');  
   			 if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        	 	$objEmail=new anagraficautenti();
	        	$objEmail->ckUser($email);
		     	if($objEmail->Data) {  
           				$result['status']='OK';
	       				$result['msg']=MSG_ERROR_EMAIL_PRESENT;
						$result['data']=$objEmail->Data;
						$objRel = new relation;
	                    $objRel->IdDominio=$dominio;
						$objRel->IdObjecta=$Id;
			            $objRel->IdObjectb=$objEmail->Data->IdUser;
						$objRel->ckRelation($objRel->IdDominio);
						if($objRel->Data) {
							$result['status']='KO';
	       				    $result['msg']=MSG_ERROR_EMAIL_PRESENT;
						}
						
        		}  
				else {  
           		$result['msg']=MSG_ERRORE_EMAIL_NOT_FOUND;
	       		$result['status']='KO';  
        	}  
	      
   			} else {  
           		$result['msg']=MSG_ERRORE_EMAIL_FORMAT;
	       		$result['status']='KO';  
        	}  

    }
    if($name=='getPwd'){
    	
			$email = filter_var(ma_getParameter('email'), FILTER_SANITIZE_EMAIL);  
   			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        	 	$users  = new SmartCartUser($db_ora,0);
        	 	$users->lang=ma_site_to_oracle_lang($_SESSION[langSite]);
            	$output = $users->recoverPWD($email);
              
				if ($output[0]) {
				    $output = $users->sendPWD($output[1]);
					$result['status']='OK';
					$result['msg']=$output[1];
				}   	 	
				else {
					if($output[0])$result['status']='OK';
        	        $result['msg']=$output[1];
				}
			 	
	      
   			} else {  
           		$result['msg']=MSG_ERRORE_EMAIL_FORMAT;
	       		$result['status']='KO';  
        	}  
    }
   
   echo json_encode($result);
};


$app->get('/delete/:actionType/:id','delete'); 

function delete ($actionType,$id){
	global $app;
	if($name=='login'){
   			echo  'sono  qui';

    }
	//userTrackerHandler::fastTracker('delete',$app->mainTab,'ajax',$id,'deleteAjax');
	 
  	if($actionType=='deleteImages'){
     	 $obj = new $app->mainTab;
         $obj->deleteItemValue($app->campo,$id);
         $msg=MSG_HELP_DELETED;
   		 $result['status']='OK'; 
	     $result['msg']=MSG_HELP_DELETED;
	     
        	 

    }
	else if($actionType=='deleteItem'){
		$obj = new $app->mainTab;
   		$obj->deleteItem($id);
		$result['status']='OK'; 
   		$result['msg']=MSG_HELP_DELETED;
    }
    elseif($actionType=='deleteUserFromList'){
   		$Id=ma_getParameter('Id');
   		$objAction->deleteItem($Id);
   	    $result['status']='OK'; 
   		$result['msg']=MSG_HELP_DELETED;
	}
	elseif($actionType=='deleteUserItem'){
   		$obj = new $app->mainTab;
		$IdUserActionType=$app->request()->get('IdUserActionType');
		$IdActionType=($IdUserActionType)?$IdUserActionType:'IdAttivita';
   		$obj->deleteItemValueFromSet($IdActionType,$id,$app->mainTab);
		$result['status']='OK'; 
   		$result['msg']=MSG_HELP_DELETED;
	}
	elseif($actionType=='sortList'){
  		//faccio include  dellhandler
   		$objDoc=new documenti();
   		$objDoc->_ma_pre_getData();
   		$objDoc->setCurField('Sort');
	
   		$data=ma_getParameter('item_documenti');
   		$objDoc->updateSortList($data);
   		$msg=$userList;
   }
   
   
   echo json_encode($result);
};	
	


$app->get('/update(/:actionType(/:id))','update');

function update($actionType = 2010, $id = 12) {
   	
	
   if($actionType=='sortList'){
  //faccio include  dellhandler
       foreach($_REQUEST as $key => $value) {
         if($curKey=='')$curKey=$key;
       }
	   $curKeyArray=explode('_',$curKey);
       $objDoc=new $curKeyArray[1]();
       $objDoc->_ma_pre_getData();
       $objDoc->setCurField('Sort');
       $data=ma_getParameter($curKey);
	   $objDoc->updateSortList($data);
       $result['msg']=$userList;
	   $result['status']='OK';
    }
   else if($actionType=='getImageList'){
      //faccio include  dellhandler
      $Id=$id;
      include(DIR_FS_CMS_BLOCKS.'imageList.inc.php');
	  $result=$docList;
	  $htmlResult=1;
    }
   elseif($actionType=='addItemToSet'){
   	  $mainTab=ma_getParameter('mainTab');
	   $curField=ma_getParameter('field');
	   $value=ma_getParameter('value');
       $objDoc=new $mainTab;
       $objDoc->addItemToSet($mainTab, $curField,$value,$id);
    }
   elseif($actionType=='removeItemToSet'){
   	     $mainTab=ma_getParameter('mainTab');
   	    $curField=ma_getParameter('field');
	    $value=ma_getParameter('value');
        $obj = new $mainTab;
   		$obj->deleteItemValueFromSet($curField,$id.'_'.$value,$mainTab);
    }
   elseif($actionType=='updateItemFromList'){
  //faccio include  dellhandler

       $mainTab=ma_getParameter('mainTab');
	   $curField=ma_getParameter('field');
	   $value=ma_getParameter('value');
       if(class_exists($mainTab))$objDoc=new $mainTab();
	   else $objDoc=new articoli;
       $objDoc->updateFastById($id,$curField,$value);
       
       $result['msg']='';
	   $result['status']='OK';
    }
   else if($actionType=='modalEdit') {
   	    
   	   include('../../../config/configure.php');
      require_once(DIR_FS_CMS_INCLUDES.'common_includes.inc.php');
	 
   	  try {
  			$DNS="mysql:host=".DB_SERVER.";dbname=".DB_DATABASE;  
    		# MySQL with PDO_MYSQL  
    		$DBH = new PDO($DNS,DB_SERVER_USERNAME, DB_SERVER_PASSWORD);  
    		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			//$library = new NotORM($DBH); 
	 		$db= new commonQuery();
			$mode=ma_getParameter('mode');
			$multiTable=$multiUpdate=array('pippo');
    		include_once(DIR_FS_COMMONLIB_CLASSES."resizeimage.class.php");
      		require_once (DIR_FS_FUNCTIONS."fileUp.inc.php");
      		require_once (DIR_FS_COMMONLIB_CLASSES."action.php");
      		require_once (DIR_FS_FUNCTIONS."crm_insert.php");
			
	  		$result['status']='OK';
			$result['msg']='MSG_HELP_SAVE_OK';
       }  
     catch(PDOException $e) {  
          echo $e->getMessage();  
     }   	  
   	
   }

   
   if($htmlResult==1) echo $result;
   else echo json_encode($result);;
};


$app->post('/update(/:actionType(/:id))','postaUpdate'); 

function postaUpdate ($actionType = 2010, $id = 12) {
   	
	
  if($actionType=='modalEdit') {
  	  include('../../../config/configure.php');
      require_once(DIR_FS_CMS_INCLUDES.'common_includes.inc.php');
	  $mode='edit';
   	  try {
  			$DNS="mysql:host=".DB_SERVER.";dbname=".DB_DATABASE;  
    		# MySQL with PDO_MYSQL  
    		$DBH = new PDO($DNS,DB_SERVER_USERNAME, DB_SERVER_PASSWORD);  
    		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			//$library = new NotORM($DBH); 
	 		$db= new commonQuery();
			$mode=ma_getParameter('mode');
			$multiTable=$multiUpdate=array('pippo');
    		include_once(DIR_FS_COMMONLIB_CLASSES."resizeimage.class.php");
      		require_once (DIR_FS_FUNCTIONS."fileUp.inc.php");
      		require_once (DIR_FS_COMMONLIB_CLASSES."action.php");
      		require_once (DIR_FS_FUNCTIONS."crm_insert.php");
			
	  		$result['status']='OK';
			$result['msg']=MSG_HELP_SAVE_OK;
       }  
     catch(PDOException $e) {  
          echo $e->getMessage();  
     }
  }

   $actionType;
   echo json_encode($result);;
};


$app->post('/userList(/:actionType(/:Id))','userList'); 

function userList ($actionType = '201', $Id = '12'){
	     global $app;
	     global $result;
		 $IdObjectB= $app->request()->post('IdObjectB');
		 $objList=new user();
		
		 
		 if($actionType=='add') $objList->addItemToSet('user','IdAttivita',$Id,$IdObjectB);
		 else {
		      
		     
		 	   $objPageTree=new articoli;
         	   $objPageTree->getTreeFromChild($Id);
			   $objList->_ma_getList();
		 	   $addWhere='IdProfilo in("top","premium","standard") and  FIND_IN_SET('.$objPageTree->TopId.',IdMarchi)';
		       $addWhere.=' and  NOT FIND_IN_SET('.$Id.',IdAttivita)';
			   $objList->wObj->addWhere($addWhere);
			   $objList->getData();
			   
			   if($objList->Data){
			   	foreach ($objList->Data as $d) {
					$objList->addItemToSet('user','IdAttivita',$Id,$d->a);   
				}
				
			   }
			   
			   
		 }
		 $objList->debug=0;
		 $result['status']='OK';
		 include(DIR_FS_CMS_MODULES."common/userListHandler.inc.php");
		 echo $userList;
};




$app->post('/userListAction(/:actionType(/:Id))','userListAction'); 

function userListAction ($actionType = '201', $Id = '12'){
	     global $app;
	     global $result;
		 $IdObjectB= $app->request()->post('IdObjectB');
		 $ItemType=$app->request()->post('ItemType');
		 $objList=new user();
		
		 
		 if($actionType=='add') $objList->addItemToSet('user',$ItemType,$Id,$IdObjectB);
		 else {
		      
		     
		 	   
			   $objList->_ma_getList();
		 	  
		       $addWhere.='  NOT FIND_IN_SET('.$ItemType.','.$Id.')';
			   $objList->wObj->addWhere($addWhere);
			   $objList->debug=0;
			   $objList->getData();
			
			   if($objList->Data){
			   	foreach ($objList->Data as $d) {
					$objList->addItemToSet('user',$ItemType,$Id,$d->a);   
				}
				
			   }
			   
			   
		 }
		 $objList->debug=0;
		 $result['status']='OK';
		 if($ItemType=='IdTodoList')include(DIR_FS_CMS_MODULES."common/userTodoListHandler.inc.php");
		 echo $userList;
};

$app->get('/relation(/:actionType(/:dominio))','relationFun'); 

function relationFun ($actionType = 2010, $dominio = 12)  {
	     global $app;
	     global $result;
		 $Id= $app->request()->get('Id');
		 $IdObjectB= $app->request()->get('IdObjectB');
		 $value= $app->request()->get('value');
		
		 if($actionType=='insert'){
			  //  verifico  che il  valore  sia  valido
		      if($dominio=='shareEmail'){
		      	$objEmail=new anagraficautenti();
	            $objEmail->ckUser($value);
			    $IdObjectB=$objEmail->Data->IdUser;
		      	$useValue=1;
			  }
			  if($dominio=='todolistTask'){
		          	$useValue=1;
			  }
		      $objRel = new relation;
	          $objRel->IdDominio=$dominio;
              $objRel->IdObjecta=$Id;
			  $objRel->IdObjectb=$IdObjectB;
			  
			  if($useValue)$objRel->addRelationValue($value,0);
			  else $objRel->addRelation($IdObjectB);
              $objRel->dataRelation=relation::ma_getFastRelation($dominio,$objRel->IdObjecta);
              echo $msg=ma_helper_list_relation ($objRel->dataRelation,1,1,'sortable',1);
      	 }
         else if($actionType=='delete'){
			 
      	 }
		 
};	

$app->get('/suggest(/:actionType(/:dominio))','suggest'); 

function suggest($actionType = 2010, $dominio = 12)  {
         global $app;   
	     $maxRow= $app->request()->get('maxRows');
		 $searchValue= $app->request()->get('name_startsWith');
		 $cssClass= $app->request()->get('featureClass');
		 $Id= $app->request()->get('Id');
		 $IdUserActionType=$app->request()->get('IdUserActionType');
		 $IdActionType=($IdUserActionType)?$IdUserActionType:'IdAttivita';
		 
		 $objList=new $actionType();
		
		 $objList->debug=0;
		 if($IdActionType=='IdAttivita') {
		     $objPageTree=new articoli;
             $objPageTree->getTreeFromChild($Id);
		     $addWhere='IdProfilo in("top","premium","standard") and  FIND_IN_SET('.$objPageTree->TopId.',IdMarchi)';
		     $addWhere.=' and  NOT FIND_IN_SET('.$Id.',IdAttivita)';
		 }
		 elseif($IdActionType=='IdTodoList') {
		     $objPageTree=new articoli;
           
		     $addWhere.='  NOT FIND_IN_SET('.$Id.','.$IdActionType.')';
		 }
		 
		 
		
		 if(String::ma_not_null($maxRow))$objList->setLimit(0,$maxRow);
   		 
   		 $result['data']=$objList->suggestList($searchValue,$addWhere);
		 if($result['data'])$result['status']='OK';
		 else $result['status']='KO'; 
		
		echo json_encode($result);
		 
};	

$app->run();