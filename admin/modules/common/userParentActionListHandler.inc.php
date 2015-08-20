<?php
require_once(DIR_FS_CLASSES."usertoaction.class.php"); 
if($objCrumber->arrayRevBreadCrumbs){
  foreach($objCrumber->arrayRevBreadCrumbs as $da){
     $arrAction[]=$da->a;
  }

  $ObjUserParentList= new usertoaction();
  $ObjUserParentList->setDomain($Id_sez);
  $ObjUserParentList->getUserByAction($arrAction);
  $ObjUserParentList->getData();
  if($ObjUserParentList->Data){
   $userParentList.="<ul class=\"simpleList\">";
     foreach($ObjUserParentList->Data as $d){
       $userParentList.="<li  id=\"IdRow_".$d->Id."\">".$d->Username."</li>";
     }
    $userParentList.="</ul>";
   }
   else $userParentList=MSG_NO_USER;
}
else $userParentList='';
?>
