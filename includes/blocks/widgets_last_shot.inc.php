<?php
$objItemsListLast= new gallery();
$objItemsListLast->makeGallery('immagini'.$objPage->docSuffix,10, $lang);
$objItemsListLast->debug = 0;
$objItemsListLast->setRandom(IMAGES_HP);
$objItemsListLast->getData();
if($objItemsListLast->Data){
	 $ls = 0;
	 foreach($objItemsListLast->Data as $itemLast){
	 	
		//$itemLast = articoli::lang_text_helper($itemLast->Data->Dominio,$itemLast->Data,$lang);;
		$active   = ( $ls==0 ) ? 'active' : '' ;
		$title    = ( $itemLast->TitleLang ) ? $itemLast->TitleLang : $itemLast->Title;
 		$htmlListLast.="<div class=\"item ".$active."\">\n";
            $htmlListLast.=ma_make_image_tt('img/'.$itemLast->Doc,"thumb",$title,'img-responsive','&w=800&h=500&zc=1') ;
            $htmlListLast.="<div class=\"carousel-caption\">\n";
               $htmlListLast.="<p>".$title.".</p>\n";
            $htmlListLast.="</div>\n";
        $htmlListLast.="</div>\n";
		$ls++;
     } 
} 
?>
<!-- Latest Shots -->
<div class="col-md-4">
	<div class="headline"><h2><i class="fa fa-camera"></i><?php echo CL_BREMBILLA_DA_VEDERE?></h2></div>
	<div id="myCarousel" class="carousel slide carousel-v1">
        <div class="carousel-inner">
        	<?php echo  $htmlListLast?>   
        </div> 
        <div class="carousel-arrow">
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
	</div>
</div><!--/col-md-4-->