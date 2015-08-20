<?
require_once(DIR_FS_CLASSES.$Id_sez.'.class.php');
$objSez= new $Id_sez();
if($mode!='up'){
    $objSez->_ma_pre_getData($Id);
    $objSez->getData(2);
}

$mainTab=$objSez->tablename;
$titoloItem=ma_get_pageTitle($objSez->Data->Label,CL_CATEGORIE);
$IdAzione=$objSez->Id; 

$IdAzione=$objSez->Id; 
$objSez->docDomain=$Id_sez;
$sufixDoc=$objSez->docDomain;

if($_FILES['myNomeFile']['name']!=''){
  $IdCategory="immagini".$sufixDoc;
  $docType='img';
  $Doc=$_FILES['myNomeFile'];
  include(DIR_FS_MODULES.'common/docUploadHandler.inc.php');
  include(DIR_FS_MODULES.'common/docInsertdHandler.inc.php');
}
if($_FILES['myDocFile']['name']!=''){
 echo $IdCategory="documenti".$sufixDoc;
  $Doc=$_FILES['myDocFile']['name'];
  $docSort=ma_getParameter('myDocSort');
  $docTitle=ma_getParameter('myDocTitle');
  $docLang=ma_getParameter('myDocLang');
  $docType='doc';
  
  include(DIR_FS_MODULES.'common/docUploadHandler.inc.php');
  $Doc=$_FILES['myDocFile'];
  include(DIR_FS_MODULES.'common/docInsertdHandler.inc.php');
}

$objForm= new cmsForm();
?>