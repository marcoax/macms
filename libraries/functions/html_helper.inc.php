<?php
function ma_helper_doc_link($valore,$tipo,$class='red',$label='',$id=''){
  $label=(String::ma_not_null($label))?$label:$valore;
  $id=($id)?'id="'.$id.'"':'';
  if($tipo)$pathMedia=DIR_WS_REPOSITORY.str_replace('//','/',strtolower($tipo).'/').$valore;
  else  $pathMedia=DIR_WS_REPOSITORY.$valore;
  return  '<a href="'.$pathMedia.'" target="_new" class="'.$class.'" '.$id.' >'.$label.'</a>';
}

function ma_helper_edit_link($Id_sez,$Id_sub,$Id,$class='red',$label=MSG_HELP_MODIFY,$addUrl=''){
  
  $path=FILENAME_EDIT.".php?mode=edit&amp;Id_sez=".$Id_sez."&amp;Id_sub=".$Id_sub."&amp;Id=".$Id.$addUrl;
  return  '<a href="'.$path.'"  class="'.$class.'">'.$label.'</a>';
}

function ma_helper_view_link($Id_sez,$Id_sub,$Id,$class='red',$label=MSG_HELP_VIEW,$addUrl='',$title=''){
  $path=FILENAME_VIEW.".php?mode=edit&amp;Id_sez=".$Id_sez."&amp;Id_sub=".$Id_sub."&amp;Id=".$Id.$addUrl;
  $title=($title)?stripslashes($title):$label;
  return  '<a href="'.$path.'"  class="'.$class.'" title="'.$title.'">'.$label.'</a>';
}

function ma_helper_add_link($Id_sez,$Id_sub='',$Id='',$class='red',$label=MSG_HELP_VIEW,$addUrl=''){
  $path=FILENAME_EDIT.".php?mode=up&amp;Id_sez=".$Id_sez."&amp;Id_sub=".$Id_sub."&amp;Id=".$Id.$addUrl;
  return  '<a href="'.$path.'"  class="'.$class.'">'.$label.'</a>';
}

function ma_helper_list_link($Id_sez,$Id_sub,$Id='',$class='red'){
  $path=FILENAME_LIST.".php?Id_sez=".$Id_sez."&amp;Id_sub=".$Id_sub."&amp;Id=".$Id;
  return  '<a href="'.$path.'"  class="'.$class.'">'.MSG_HELP_VIEW.'</a>';
}


function  ma_helper_view_image_link($image,$tipo,$class='red',$prefix='thumb_',$label=''){
  $imag;
  if($tipo)$pathMedia=DIR_WS_REPOSITORY.strtolower($tipo).'/';
  else  $pathMedia=DIR_WS_REPOSITORY.'/';
  return  '<a href="'.$pathMedia.$image.'" target="_new" class="'.$class.'"><img src="'.$pathMedia.$prefix.$image.'" alt="'.$label.'" border="0"></a>';
}

function ma_helper_list_tag($data,$showCount=0){
  if($data){
   $htmlList.="<ul>\n";
   foreach($data as $d){
     $htmlList.="<li id=\"".$d->Id."\">".stripslashes($d->a); 
	 if(String::ma_not_null($showCount))$htmlList.=" (".$d->c.")";
	 $htmlList.="</li>\n";
   }
   $htmlList.="</ul>\n";
  }

  return $htmlList;
}




function ma_get_pageTitleView($titoloItem,$titoloSez='',$titoloSub='',$sepa=''){
  global $Id_sez;
  global $Id_sub;
  global  $Id;
  if($titoloSez)$html.='<li><a href="'.FILENAME_LISTA.".php?Id_sez=".$Id_sez."&Id_sub=".$Id_sub.'">'.$titoloSez.'</a>';
  if($titoloSub)$html.='<li><a href="'.FILENAME_EDIT.'.php?mode=up&amp;Id_sez='.$Id_sez."&amp;Id_sub=".$Id_sub."&amp;Id=".$Id.'">'.stripslashes($titoloSub).'</a></li>';
  if($titoloItem)$html.='<li class="active">'.stripslashes($titoloItem). '</li>';
  return $html;
  
}


function ma_get_pageTitle($titoloItem,$titoloSez='',$titoloSub='',$sepa='/'){
  global $Id_sez;
  global $Id_sub;
  
  if($titoloSez)$html.='<li><a href="'.FILENAME_LISTA.".php?Id_sez=".$Id_sez."&Id_sub=".$Id_sub.'">'.$titoloSez.'</a></li>';
  if($titoloSub)$html.='<li><a href="'.FILENAME_LISTA.".php?Id_sez=".$Id_sez."&Id_sub=".$Id_sub.'">'.stripslashes($titoloSub).'</a></li>';
  if($titoloItem)$html.='<li class="active">'.stripslashes($titoloItem). '</li>';
  return $html;
  
}



function ma_get_pageTitle_bc($titoloItem,$titoloSez='',$titoloSub='',$arrayRevBreadCrumbs='',$isBreadGrumbs=1){
  if($titoloSez)$title.=strToupper($titoloSez);
  if($isBreadGrumbs){
    return $title=ma_helper_crumbs($arrayRevBreadCrumbs,$titoloItem,$titoloSez);
  }
  else {
    if($titoloSub){$title.='&raquo; '.$titoloSub;}
    if($titoloItem)$title=($title)?$title.": ".$titoloItem:$titoloItem;
    return stripslashes($title);
  }
  
}



function ma_helper_crumbs($data,$pageTitle,$startItem='',$sepa='/'){
   global $Id_sez;
   global $Id_sub;
   //$htmlCrumbs="<ul class=\"".$class_id."\">\n";
   if($startItem)$htmlCrumbs.="<li>".stripslashes($startItem)."</li>"; 
   if($data){
     foreach($data as $d){
      if(ma_get_page()=='edit'){
      	$domain=($d->d)?$d->d:$Id_sez;
        $url=ma_helper_edit_link($domain,$Id_sub,$d->a,'',stripslashes($d->b));
      }
      else $url=ma_helper_view_link($domain,$Id_sub,$d->a,'',stripslashes($d->b));
      $htmlCrumbs.="<li>".$url." <span class=\"divider\">".$sepa."</span></li>"; 
     }
   }
   $htmlCrumbs.="<li>".stripslashes($pageTitle)."</li>"; 
   //$htmlCrumbs.="</ul>\n";       
   return $htmlCrumbs;
}

function ma_helper_simpleList($data,$startItem='',$ul_css='simpleTree',$Id_sez='',$curItem=''){
   //  se non passo al sezione
   if(!String::ma_not_null($Id_sez)){
     global $Id_sez;
   }
   $htmlTree="<ul class=\"".$ul_css."\">\n";
   if($startItem)$htmlTre.="<li class=\"st\">".stripslashes($startItem)."</li>"; 
   if($data){
     foreach($data as $d){
      if(ma_get_page()=='edit'){
        $url=ma_helper_edit_link($Id_sez,$Id_sub,$d->a,'red',stripslashes($d->b));
      }
      if(ma_get_page()=='mappa'){
        $url=stripslashes($d->b);
      }
      else $url=ma_helper_view_link($Id_sez,$Id_sub,$d->a,'red',stripslashes($d->b));
      
      $htmlTree.="<li class=\"st l".$d->l."\" id=\"".$d->a."\">".$url."</li>\n"; 
     }
   }
   $htmlTree.="</ul>\n";       
   return $htmlTree;
}

function ma_helper_List($data,$curItem='',$ul_css='simpleTree',$Id_sez=''){
   //  se non passo al sezione
   if(!String::ma_not_null($Id_sez)){
     global $Id_sez;
   }
   $htmlTree="<ul class=\"".$ul_css."\">\n";
   if($data){
     foreach($data as $d){
       $classItem=($curItem==$d->a)?"class=\"selected\"":'';
       $url=stripslashes($d->b);
       $htmlTree.="<li  ".$classItem." id=\"".$d->a."\">".$url."</li>\n"; 
     }
   }
   $htmlTree.="</ul>\n";       
   return $htmlTree;
}



function ma_helper_treeList($data,$curItem,$treeArray,$Id_sez='',$full=true){
   //  se non passo al sezione
   
   if(!String::ma_not_null($Id_sez)){
     global $Id_sez;
   }
   global $tree;
   
   if(is_array($treeArray)){
      foreach($treeArray as $t){
        $arrayCat[]=$t->a;
      }
   }
   else $arrayCat[]=$currItem;
  
  
 
  $i=0;
  if($data){
	  foreach($data as $d){
	   $label=stripslashes($d->b);
	   $shortLabel=($full==false)?substr($label,0,38):$label;
	   $item_id=$Id_sez."_".stripslashes($d->a);
	   if(String::ma_not_null($d->t))$item_id.="_".$d->t;
	   $isOpen=false;
	   $classStyle='';
	   
	   if(in_array($d->a,$arrayCat) or $d->a==$curItem or $d->p==$curItem or $full==true){
	  		if(in_array($d->a,$arrayCat) and  $d->a!=$curItem){
				$isOpen=true;
			}
			if($d->a==$curItem and $full==false)$classStyle="treeEvi";
			
			$attribute=array('open'=>$isOpen,'onclick'=>'clickHandler','ondblclick'=>'dbclickHandler','style'=>$classStyle,'title'=>$label);
			
			if($d->l==0){
				$b1 = $tree->addBranch($item_id, $label,$attribute);
			}
			else if ($d->l==1) {
			  $b2=$b1->addBranch($item_id,$label,$attribute);
			}
			else if($d->l==2) $b3=$b2->addBranch($item_id,$shortLabel,$attribute);
			else if($d->l==3) $b4=$b3->addBranch($item_id,$shortLabel,$attribute);
			else if($d->l==4) {
			  $b5=$b4->addBranch($item_id,$shortLabel,$attribute);
		   }
	   }
	   $i++;
	  };
	}
}

function ma_helper_indent($level=0,$sep='__'){
     if($level!=0)$str="|";
     for ($i=0;$i<$level;$i++){
        $str.=$sep;
     }
     return $str;
  }
  
  
  function ma_helper_legend($data){
     if($data){
     foreach($data as $d){
        $htmlTree.="<span style=\"border-left:15px solid #".strtoupper($d->c).";\">".stripslashes($d->b)."</span>"; 
     }
   }
   return $htmlTree;
  }
  
  function ma_helper_Modal($size) {
  	return $htmlModal="data-toggle=\"modal\"";
  }
  
  function ma_helper_view_text($label,$value){
    return "<h3>".$label.": <span class=\"unbold\">".stripslashes($value)."</span></h3>\n";
  }
  
  function ma_helper_view_descrizione($label,$value){
    $htmlDesc.="<h3>".$label."</h3>\n";
    $htmlDesc.="<div class=\"boxDescrizione\">".stripslashes($value)."</div>\n";
    return $htmlDesc;
  }
  
  function ma_helper_list_relation ($data,$showDelete=1,$showValore=0,$Id='',$isRemote=0){
  if($isRemote==0)$htmlList.="<ul class=\"simpleDocList\" id=\"".$Id ."\">\n";
    if($data){
   
        foreach($data as $d){
           
            $htmlList.="<li id=\"item_relation_".$d->a."\" >\n";
            if($showDelete==1)$htmlList.="<span class=\"pull-right\"><a href=\"#\" class=\"red\" id=\"delete_relation_".$d->a."\" alt=\"".MSG_HELP_DELETE."\" onclick=\" deleteItem(this);return false\"><b> X </b> </a></span>\n";
            if($showValore==1)$htmlList.=stripslashes($d->Valore);
			else $htmlList.=stripslashes($d->b);
			
          
             $htmlList.="</li>";
        }
        
    }
    else $htmlList.="<li class=\"odd\">".MSG_NOITEM."</li>";
    if($isRemote==0)$htmlList.="</ul>\n";
    return $htmlList; 
}
?>
