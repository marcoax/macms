<?php 
$htmlListProject='';
if($objItemsList->Data) {
	foreach($objItemsList->Data as $item){
		
	//$item=articoli::lang_text_helper($item->Dominio,$item,$lang);
	//print_r($item);
	$dataTitle = articoli::ma_getFastDescrizione('documenti','Title',$item->IdDocumento,$lang);
	$itemImg   = ma_make_image_fancybox_tt('img/'.$item->Doc,"thumb",$dataTitle,'img-responsive','&w=300&h=300&zc=2');
	$item->t   = $item->Code;
    $itemUrl   = Tool::seoPathHandler($item);
	  		
	$htmlListProject.="<div class=\"col-md-3 col-sm-6 col-xs-12 mb15\">\n";
		$htmlListProject.="<div class=\"thumbnail prodotti relative \">\n";
			$htmlListProject.=$itemImg;
			$htmlListProject.="<div class=\"caption bck-color-2\">".strtoupper($dataTitle)."</div>\n";
		$htmlListProject.="</div>\n";
	$htmlListProject.="</div>\n";	
	} 		
}  

