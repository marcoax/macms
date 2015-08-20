<?php
if(file_exists(DIR_FS_APPLICATION_CLASS.$Id_sub.'.class.php')) {
		require_once(DIR_FS_APPLICATION_CLASS.$Id_sub.'.class.php');	$objSez= new $Id_sub();
}
else {
	 	require_once(DIR_FS_APPLICATION_CLASS.$Id_sez.'.class.php');	$objSez= new $Id_sez();
}
if($mode!='up'){
	   $objSez->_ma_pre_getData($Id);   
	   $objSez->getData(2);
}

$objTitolo=$objSez->titoloItem;
$mainTab=$objSez->tablename;
$objSezTitle= new articoli();
$objSezTitle->ma_getByPageCode($Id_sub);

$objPage->bc_titoloItem=ma_get_pageTitle($objSez->Data->$objTitolo,$objSezTitle->Data->Name);
$objSez->showImageLang=0;

if($_FILES['myNomeFile']['name']!=''){
  $IdCategory="immagini";
  $Doc=$_FILES['myNomeFile'];
  $docType='img';
  $docLang=ma_getParameter('myImgLang');
  $docIdSubCategory=ma_getParameter('myImgType');
  include(DIR_FS_CMS_MODULES.'common/docInsertdHandler.inc.php');
  include(DIR_FS_CMS_MODULES.'common/docUploadHandler.inc.php');
}
if($_FILES['myDocFile']['name']!=''){
  $IdCategory="documenti";
  $Doc=$_FILES['myDocFile'];
  $docSort=ma_getParameter('myDocSort');
  $docTitle=ma_getParameter('myDocTitle');
  $docLang=ma_getParameter('myDocLang');
  $docType='doc';
  include(DIR_FS_CMS_MODULES.'common/docInsertdHandler.inc.php');
  include(DIR_FS_CMS_MODULES.'common/docUploadHandler.inc.php');
}

$objForm= new cmsForm();
