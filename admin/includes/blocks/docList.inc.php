<?php $objDocList=new documenti();$objDocList->getMediaList($Id,'documenti'.$sufixDoc);$objDocList->debug=0;$docList='';if($isRemote==1) $objDocList->Order="dv.Doc";else $objDocList->Order="Sort,IdDocumento";$objDocList->getData();if($objDocList->Data){ $curStato='';  $docList.="<ul class=\"simpleList\" id=\"simpleDocList\">";  foreach($objDocList->Data as $d){     $IdDocOwner=$d->CreatedBy;     if($d->Stato!=$curStato)$docList.="<li><b>".$d->Stato."</b></li>";     $labelAction=($d->Pub==1)?MSG_HELP_DRAFT_BACK:MSG_HELP_PUBLISH;     $IdStato=($d->Pub==1)?0:1;	 $title=($d->Title)?$d->Title:$d->Doc;	 $pathDocUrl=FILENAME_EDIT_MODAL.".php?mode=edit&amp;Id_sez=documenti&amp;Id_sub=".$d->IdCategory."&amp;modal=1&amp;Id=".$d->IdDocumento;     $docList.="<li id=\"item_".$objDocList->tablename."_".$d->IdDocumento."\">\n";	 $docList.=ma_helper_doc_link($d->Doc,'doc','sotto',stripslashes($title))."  ";     $docList.=" - <a href=\"#\" class=\"red\" onclick=\"deleteItem(this,1); return false\" id=\"delete_".$objDocList->tablename."_".$d->IdDocumento."\">".MSG_HELP_DELETE."</a>\n";     $docList.=" - <a  title=\"".$title."\" href=\"".$pathDocUrl."\" class=\"red\" data-toggle=\"modal\" >Edit</a>\n";     $docList.="</li>\n";     $curStato=$d->Stato;  }  $docList.="</ul>";  }else $docList=MSG_NO_DOC;?>