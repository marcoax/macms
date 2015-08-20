<?
require_once(DIR_FS_CLASSES."evento.class.php"); 
$ObjEventList= new evento();
if($oc->isReserved('evento')){
    $ObjEventList->getEventByAction($Id);
	$arrayEventi[]=ID_MEETING;
	$arrayEventi[]=ID_MEETING_INTERNO;
	$ObjEventList->wObj->setIN("IdCategory",$arrayEventi);
}
else {
	$ObjEventList->getEventByAction($Id,ID_MEETING);
}
// se  non sono in modalita show  all
if(!ma_hasParameter('actionType')=='showAllEvents')$ObjEventList->setLimit(0,1);
$ObjEventList->getData();
if($ObjEventList->Data){
  $eventList.="<ul class=\"simpleList\">";
  foreach($ObjEventList->Data as $d){
  
    $eventList.="<li> <b class=\"red\">&raquo;</b> <a href=\"show_event.php?Id_sez=evento&Id=".$d->Id."&color=".strtoupper($d->Valore)."\" title=	\"".stripslashes($d->Title)."\" onclick=\"Modalbox.show(this.href, {title: this.title, width: 500}); return false; \">".$invDate->invDate($d->Data)."</a></li>";
  }
  $eventList.="</ul>";
}
else $eventList=MSG_NO_MEETING;
?>

