<?php  $objSez= new $Id_sez();  if($mode!='up'){  	$objSez->_ma_pre_getData($Id);    $objSez->getData(2);  }  $objTitolo=$objSez->titoloItem;  $mainTab=$objSez->tablename;  $titoloItem=$objSez->Data->$objTitolo;  $objPage->bc_titoloItem=ma_get_pageTitle($objSez->Data->$objTitolo,$objSez->sezTitle);    if($_FILES['myNomeFile']['name']!=''){  $IdCategory="immagini";  $Doc=$_FILES['myNomeFile'];  $docType='img';  $docLang=ma_getParameter('myImgLang');  $docIdSubCategory=ma_getParameter('myImgType');  include(DIR_FS_CMS_MODULES.'common/docInsertdHandler.inc.php');  include(DIR_FS_CMS_MODULES.'common/docUploadHandler.inc.php');}if($_FILES['myDocFile']['name']!=''){  $IdCategory="documenti";  $Doc=$_FILES['myDocFile'];  $docSort=ma_getParameter('myDocSort');  $docTitle=ma_getParameter('myDocTitle');  $docLang=ma_getParameter('myDocLang');  $docType='doc';  include(DIR_FS_CMS_MODULES.'common/docInsertdHandler.inc.php');  include(DIR_FS_CMS_MODULES.'common/docUploadHandler.inc.php');}if(ma_getParameter('myVideoLink')!=''){  $IdCategory="video";  $mediaCode=ma_getParameter('myVideoLink');//   codice per l'emded  $docSort=ma_getParameter('myVideoSort');  $docTitle=ma_getParameter('myVideoTitle');  $mediaName=$docTitle;//   codice per l'emded  $docLang=ma_getParameter('myVideolang');  $docType='video';  include(DIR_FS_CMS_MODULES.'common/docInsertdHandler.inc.php');}  $objForm= new cmsForm();  $IdOwner=$objSez->Data->CreatedBy;?>