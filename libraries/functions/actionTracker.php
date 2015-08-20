<?php 
     
     if(DB_TYPE=='oracle'){
	  require_once(DIR_FS_SHARED_CLASSES.'browser_detection.php'); 
	  require_once(DIR_FS_SHARED_CLASSES.'spusertracker.class.php');
	  //*************************************************************************** tracker init ************/
	  $objTracker = new userTrackerHandler();
	  $objTracker->setWebSite(HTTP_SERVER);
	  $objTracker->setActionType($actionTypeMode);
	  $objTracker->setSection(APP_NAME);//metto website  cosi  distinguo da   quelli del  cms
	  $objTracker->setSub($Id_sez);
	  $objTracker->setIdObject($curArticle);
	  $objTracker->setPage($curPage);
	  if($MediaTitle)$objTracker->setPageTitle($MediaTitle);
	  $objTracker->setPageTitle($objPage->pageTitle);
	  $objTracker->setMediaFile($MediaFile,$MediaType);
	  $objTracker->setUser($_SESSION['IdUser'],$_SESSION['LOGIN_CO']);
	  $objTracker->getParameter();
	  // $objItemsList->pagerString;
	  if($pagerString)$objTracker->setSearchParameter($pagerString);
	  if($MediaFullUrl)$objTracker->setFullUrl($MediaFullUrl);
	  $objTracker->updateTracker(); //**** tracker update ************/
	 }
     else  {
     	include_once(DIR_FS_FUNCTIONS."actionTracker_pdo.php");
     }
     
?> 
