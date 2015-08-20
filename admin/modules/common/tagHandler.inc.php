<?php 
  //require_once(DIR_FS_COMMONLIB_CLASSES.'sptag.class.php');
  $objTag = new sptag();
  echo isset($_POST[$mainTab."_dateCreation"]);
  if($Id && $_POST[$mainTab."_dateCreation"]){
  	$curTag=ma_getParameter($mainTab."_TAG");
  	$langTag=ma_getParameter($mainTab."_LANG");
  	$objTag->setIdParent($Id);
  	$objTag->setDomain($Id_sez);
    $objTag->tagLang=$langTag;
  	$objTag->deleteAll();
  	if(String::ma_not_null($curTag))$objTag->insertAll($curTag);
  }
?>
