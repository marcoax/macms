<?
require_once(DIR_FS_CLASSES."gruppi.class.php"); 
$ObjUserList= new gruppi();
$ObjUserList->getGroupByUser($Id);
$ObjUserList->getData();
if($ObjUserList->Data){
  $userList.="<ul class=\"simpleList\">";
  foreach($ObjUserList->Data as $d){
    $userList.="<li  id=\"IdRow_".$d->uaId."\">".stripslashes($d->Label)."&nbsp;&nbsp;<a href=\"#\" class=\"red\" onclick=\"deleteUserFromList('".$d->uaId."');return false\">Elimina</a></li>";
  }
  $userList.="</ul>";
}
else $userList=MSG_NO_USER_GROUP;
?>
