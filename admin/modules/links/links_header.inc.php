<?php
if(file_exists(DIR_FS_CLASSES.$Id_sub.'.class.php')) {
		require_once(DIR_FS_CLASSES.$Id_sub.'.class.php');
	$objSez= new $Id_sub();
}
else { 
	require_once(DIR_FS_CLASSES.$Id_sez.'.class.php');
	$objSez= new $Id_sez();
}

if($mode!='up'){
   $objSez->_ma_pre_getData($Id);
   $objSez->getData(2);
}
$mainTab=$objSez->tablename;
$objSezTitle= new articoli();
$objSezTitle->ma_getByPageCode($Id_sub);
$titoloSez=stripslashes($objSezTitle->Data->Name);
$titoloItem=ma_get_pageTitle($objSez->Data->Name,$titoloSez);
$objSez->showImageLang=0;

if($_FILES['myNomeFile']['name']!=''){
  $IdCategory="immagini";
  $Doc=$_FILES['myNomeFile'];
  $docType='img';
  $docLang=ma_getParameter('myImgLang');
  $docIdSubCategory=ma_getParameter('myImgType');
  include(DIR_FS_MODULES.'common/docUploadHandler.inc.php');
  include(DIR_FS_MODULES.'common/docInsertdHandler.inc.php');
}
if($_FILES['myDocFile']['name']!=''){
  $IdCategory="documenti";
  $Doc=$_FILES['myDocFile'];
  $docSort=ma_getParameter('myDocSort');
  $docTitle=ma_getParameter('myDocTitle');
  $docLang=ma_getParameter('myDocLang');
  $docType='doc';
 
  include(DIR_FS_MODULES.'common/docUploadHandler.inc.php');
  include(DIR_FS_MODULES.'common/docInsertdHandler.inc.php');
}
$objForm= new cmsForm();


?>