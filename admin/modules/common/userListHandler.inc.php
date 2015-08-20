<?php$ObjUserList= new user();$ObjUserList->getUserByAction($Id);$ObjUserList->debug=0;$ObjUserList->getData();
if($ObjUserList->Data){  //$userList.="<ul class=\"simpleList\" >";  foreach($ObjUserList->Data as $d){    $userList.="<li  id=\"IdRow_".$d->a."_".$Id."\">".$d->b."&nbsp;".$d->c."&nbsp;<a href=\"#\"  onclick=\"deleteUserFromList('".$d->a."_".$Id."');return false\"><i class=\"icon-remove\"></i></a></li>";  }  //$userList.="</ul>";}
else {  //$userList.="<ul class=\"simpleList\" >";  $userList="<li>".MSG_NO_USER."</li>";     //$userList.="</ul>";}?>
