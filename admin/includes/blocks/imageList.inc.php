<?php   $objDocList=new documenti();   $objDocList->getMediaList($Id,'immagini'.$sufixImage);   if($isRemote==1)$objDocList->Order="dv.Doc";   else $objDocList->Order="Sort,IdDocumento";   //echo  $objDocList->debug=1;   $objDocList->getData();   if($objDocList->Data){   	  $curStato='';     	  $docList.="<ul class=\"thumbnails list-unstyled\" id=\"simpleGallery\">";      foreach($objDocList->Data as $d){      	  	 $title=($d->Title)?$d->Title:$d->Doc;	       	  	 $title=stripslashes($title);           	  	 $docList.="<li id=\"item_".$objDocList->tablename."_".$d->IdDocumento."\" class=\"col-xs-6 col-sm-3\">\n";	       	  	 //if($d->Sort)$docList.=$d->Sort." - ";      	  	 $docList.="<div class=\"thumbnail\">\n";	       	  	 $textId="item_".$objDocList->tablename."_".$d->IdDocumento."_text";           	  	 $docList.="<div id=\"".$textId."\" class=\"caption\">".trim($title)."</div>";	       	  	 $pathMedia=DIR_WS_REPOSITORY.'img/';	       	  	 //$docList.= ma_helper_view_image_link($d->Doc,'img','red','small_');            	  	 $docList.="<img src=\"".$pathMedia."thumb_".$d->Doc."\" alt=\"".$title."\" border=\"0\"  class=\"img-responsive mv10\">\n";	       	  	 if($isRemote==1000){      	  	 		   $docList.=" - ";             	  	 		   $docList.= ma_helper_view_link('documenti',$Id_sub,$d->IdDocumento,'sotto',MSG_HELP_SCHEDA_FILE,'&IdAzione='.$Id)." - ";      	  	 		   $docList.="<a href=\"#\" onclick=\"setStatus('setStatus','docListBody','".$d->IdDocumento."','".$IdStato."')\"       	  	 		   class=\"sotto\">".$labelAction."</a>\n";     		}     		$pathUrl=FILENAME_EDIT_MODAL.".php?mode=edit&amp;Id_sez=documenti&amp;Id_sub=".$d->IdCategory."&amp;modal=1&amp;Id=".$d->IdDocumento;	      		$docList.="<a  title=\"".$title."\" href=\"".$pathUrl."\" data-toggle=\"modal\">Edit</a> - \n";     $docList.="<a href=\"".$pathMedia.$d->Doc."\" class=\"red\" target=\"_new\">View</a> -\n";     $docList.="<a href=\"#\" class=\"red\" onclick=\"deleteItem(this);return false\" id=\"delete_".$objDocList->tablename."_".$d->IdDocumento."\">Delete</a>     		</div>\n     		</li>\n";	 $curStato=$d->Stato;  }  $docList.="</ul>";  }else $docList=MSG_NO_DOC;