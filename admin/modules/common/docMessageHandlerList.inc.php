<?
$objMsgDoc= new documenti();
$objMsgDoc->getActionMessageList($Id,'messaggi');
$curData=$objMsgDoc->getData();
if($curData){
   $allegatiList.="<ul class=\"simpleList\">";
  			foreach($curData as $d){
		    $allegatiList.="<li >".ma_helper_doc_link($d->Doc,'doc'); 
			if(ma_get_page()!=FILENAME_VIEW)$allegatiList.="&nbsp;&nbsp;[ - ] <a href=\"#\"  onclick=\"delDocVersion('del','".$d->IdDocumento."')\">".MSG_HELP_DELETE."</a>\n";
     		$allegatiList.="</li>\n";
	        }
  	    $allegatiList.="</ul>"; 
	}
else $allegatiList.=MSG_NO_DOC;
?>