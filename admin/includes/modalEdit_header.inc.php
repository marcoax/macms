<?php
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
$IdUser=$_SESSION['uid'];
// inizializzo  l'editor  html
/*
if($oc->ckPagePermission($Id_sez,ma_get_page(),$IdOwner)!=true){
    header("location: ".HTTP_SERVER.DIR_WS_CATALOG.FILENAME_NOPER.'.php');
}
*/