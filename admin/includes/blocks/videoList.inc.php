<?
require_once(DIR_FS_CLASSES."documenti.class.php"); 
$objDocList=new documenti();
$objDocList->getMediaList($Id,'video'.$sufixDoc);
$objDocList->debug=0;
$videoList='';
if($isRemote==1) $objDocList->Order="dv.Doc";
else $objDocList->Order="me.Sort,me.IdDocumento";
$objDocList->getData();
if($objDocList->Data){
 $curStato='';
 $i=0;
  $videoList.="<ul class=\"simpleList\" id=\"simpleMediaList\">";
  foreach($objDocList->Data as $d){
     $IdDocOwner=$d->CreatedBy;
     if($d->Stato!=$curStato)$videoList.="<li><b>".$d->Stato."</b></li>";
     $labelAction=($d->Pub==1)?MSG_HELP_DRAFT_BACK:MSG_HELP_PUBLISH;
     $IdStato=($d->Pub==1)?0:1;
	 $title=($d->Title)?$d->Title:$d->Doc;
	 $pathVideoUrl=FILENAME_EDIT_MODAL.".php?mode=edit&amp;Id_sez=documenti&amp;Id_sub=".$d->IdCategory."&amp;modal=1&amp;Id=".$d->IdDocumento;
     
     $videoList.="<li id=\"item_".$objDocList->tablename."_".$d->IdDocumento."\">".$i++."\n";
	 $videoList.='<a href="'.URL_YOUTUBE.$d->Doc.'" target="_new" class="red">'.$title.'</a>';
     $videoList.=" - <a href=\"#\" class=\"red\" onclick=\"deleteItem(this,1); return false\" id=\"delete_".$objDocList->tablename."_".$d->IdDocumento."\">".MSG_HELP_DELETE."</a>\n";
     $videoList.=" - <a  title=\"".$title."\" href=\"".$pathVideoUrl."\" class=\"red\" onclick=\"openModal(this.href,this.title);return false\">Edit</a> <li> \n";
   
     $videoList.="</li>\n";
     $curStato=$d->Stato;
  }
  $videoList.="</ul>";  
}
else $videoList=MSG_NO_DOC;

?>
