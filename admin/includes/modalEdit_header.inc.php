<?phprequire_once (DIR_FS_COMMONLIB_CLASSES."action.php");require_once (DIR_FS_COMMONLIB_CLASSES."Lingue.class.php");require_once (DIR_FS_COMMONLIB_CLASSES."voci".DB_USE_PDO_SUFFIX.".class.php");$dObjLingue= new Lingue;$dObjLingue->getLista(1);$dObjLingue->nLang; //  conto le  lingune$whereAdd="Pub=1 and Disable=0 ";$dObjLingue->_ma_combo_d($objSez->Data->Lang,$whereAdd);if($dObjSez)$dObjSez->Data->Lang=($dObjSez->Data->Lang)?$dObjSez->Data->Lang:$dObjLingue->defLang;$objArti= new  articoli;$objArti->pageCodeUniqueHandler($mode);require_once (DIR_FS_FUNCTIONS."crm_insert.php");	require_once(DIR_FS_COMMONLIB_CLASSES."form.class.php");
$_SESSION['IdDettglio']='';
$invDate=new invDate('');
$page=ma_get_page();
$isModal=ma_getParameter('modal');
$curMode=$mode;
if($curMode=='add' || $curMode=='del'  || $curMode=="edit"){
   $mode='edit';
}
articoli::pageCodeHandler($mode);
$objPage->Template=$objPage->Template.'_'.$layoutEdit;
require_once (DIR_FS_FUNCTIONS."fileUp.inc.php");
require_once (DIR_FS_COMMONLIB_CLASSES."action.php");
$Id=($Id)?$Id:$corrente;
if($Id!='' && $mode!='copia')$mode='edit';
if($Id=='new'){
   $Id='';
    $mode='up';
}
$IdUser=$_SESSION['uid'];$saveJs="validazioneModal('modalEdit');return false ";if($novalidazione==1)$saveJs="document.forms[0].submit()";if(file_exists(DIR_FS_CMS_MODULES.$Id_sez."/".$Id_sez."_header.inc.php"))require_once(DIR_FS_CMS_MODULES.$Id_sez."/".$Id_sez."_header.inc.php");else require_once(DIR_FS_CMS_MODULES."edit_common_header.inc.php");
// inizializzo  l'editor  html
/*
if($oc->ckPagePermission($Id_sez,ma_get_page(),$IdOwner)!=true){
    header("location: ".HTTP_SERVER.DIR_WS_CATALOG.FILENAME_NOPER.'.php');
}
*/
