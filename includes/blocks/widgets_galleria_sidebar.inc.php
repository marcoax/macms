<?php 


$i=1;
$ci=1;
$htmlListProject='';
if($objItemsList->Data) {
	foreach($objItemsList->Data as $item){
		
	$item=articoli::lang_text_helper($item->Dominio,$item,$lang);
	$itemImg=ma_make_image_lb_tt($item->Doc,"thumb",$title,'img-responsive','&w=400&zc=2');
	$item->t=$item->Code;
   
    $itemUrl=pathHndler($item);
	  		
	$htmlListProject.="<li class=\"col-xs-12\" style=\"padding:0px\">\n";
		$htmlListProject.="<div class=\"thumbnail\">\n";
		    //$htmlListProject.="<a href=\"".$itemUrl."\" title=\"".$item->Name."\">\n";
			$htmlListProject.=$itemImg;
			//$htmlListProject.="<h5 class=\"nero\">".strtoupper($item->Name)."</h5>\n";
			//$htmlListProject.="".String::string_limiter(stripslashes($item->Abstract),LIST_MAX_WORD,' ...',0)."\n";
			//$htmlListProject.="</a>\n";
			$htmlListProject.='<div class="caption"><i class="fa fa-plus-circle"></i></div>';
		$htmlListProject.="</div>\n";
	$htmlListProject.="</li>\n";	
	} 		
}  	
?>
 

<ul  class="thumbnails list-unstyled">
<?php echo  $htmlListProject?>
</ul>