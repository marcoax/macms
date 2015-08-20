<?php include(DIR_FS_BLOCKS."widgets_boostrap_slider.inc.php")?>
<?php include(DIR_FS_BLOCKS."widgets_bc.inc.php");?>
<?php echo $objFSSliderHtml->render();?>
<div class="bck-color-2">
	<div class="container pageContent pf20">
		<?php echo $objBHTML->setHideTitle(true)->setShowSubTitle(true)->getSimpleRow($objPage,"col-md-6 col-lg-6","col-md-6 col-lg-6",false,false,'h1')->render()?>
		<div class="clearfix"></div>
	</div> <!-- /container -->
</div>
<?php if($objPage->pageCode=='azienda'):?>
	<div class="container pageContent">
		<?php include(DIR_FS_BLOCKS."widgets_contatti_azienda.inc.php");?>		
	</div> <!-- /container -->
<?php endif?>
