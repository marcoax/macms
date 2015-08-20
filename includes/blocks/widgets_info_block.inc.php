<?php
$infoPageObj  = articoli::ma_GetPageByCode('il-santuario','');
$objItemsList->Data = $objBHTML->getPageMedia( $infoPageObj );
$carCode = $infoPageObj->pageCode;
include(DIR_FS_BLOCKS."widgets_boostrap_page_slider.inc.php");	
			 
?>
<div class="container content mt25-max-sm mb10">	
     	<!-- Info Blokcs -->
    	<div class="row ">
        	<div class="col-md-6  col-md-push-6">
        		<?php if($objItemsList->Data ): $objFSSliderHtml->render()?>
        		<?php elseif( $infoPageObj->Doc ):?>
        		    <?php echo boostrapHtml::embedYouTube($infoPageObj->Doc,'16')?>
				<?php else:?>
						<img class="img-responsive-100" src="<?php echo  ma_get_image_from_repsitory($infoPageObj->Img)?>" alt="<?php echo $infoPageObj->ImgTitle?>" border="0">
         		<?php endif?>
         		
    	
    		</div><!--/col-md-4--> 
    		<div class="col-md-6  col-md-pull-6 box-info relative mv25-max-sm">
    			<h1 class="mb15">/ <?php echo  $infoPageObj->Name?></h1>
    			<div class="text-justify"><?php echo  $infoPageObj->Intro?></div>
    			<div class="row botton-btn">
    				<div class="col-md-6 col-lg-6 ">
    					<a class="btn-u btn-sm-full" href="<?php echo  articoli::ma_getPermalink('il-santuario')?>"> > Continua</a>
				    </div>
    				<div class="col-md-6 col-md-6 visible-lg relative"><div class="pull-right small text-right pt15"><?php echo $infoPageObj->TitleMenu?></div></div>
    			</div>
    			</div>
             </div><!--/col-md-6--> 
     	</div>
     	<div class="clearfix"></div>	
    	<!-- End Info Blokcs -->
</div> <!-- /container -->		