<?php
 require_once(DIR_FS_COMMONLIB_CLASSES.'browser_detection.php'); 
 require_once(DIR_FS_COMMONLIB_CLASSES.'userTracker.class.php');
 //*************************************************************************** tracker init ************/
 $objTracker = new userTrackerHandler();
 $objTracker->getParameter();
 $objTracker->setActionType($actionTypeMode);
 $objTracker->setSection($Id_sez);
 $objTracker->setSub($Id_sub);
 $objTracker->setIdObject($Id);
 $objTracker->setPage($curPage);
 if($MediaTitle)$objTracker->setPageTitle($MediaTitle);
 $objTracker->setPageTitle($titoloItem);
 $objTracker->setMediaFile($MediaFile,$MediaType);
 $objTracker->setUser($_SESSION['uid'],$_SESSION['NomeUtente']);
 $objTracker->getParameter();
 if($MediaFullUrl)$objTracker->setFullUrl($MediaFullUrl);
 $objTracker->updateTracker(); //**** tracker update ************/
?>