<?php include(DIR_FS_BLOCKS."widgets_boostrap_slider.inc.php")?>
<?php include(DIR_FS_BLOCKS."widgets_bc.inc.php");?>
<?php echo $objFSSliderHtml->render();?>
<div class="bck-color-2">
	<div class="container pageContent pf20">
		<?php echo $objBHTML->setHideTitle(true)->setShowSubTitle(true)->getSimpleRow($objPage,"col-md-6 col-lg-6","col-md-6 col-lg-6",false,false,'h1')->render()?>
		<div class="clearfix"></div>
	</div> <!-- /container -->
</div>
<div class="container content mb15-min-md">
	<div class="row ">
		<div class="col-xs-12">
			<div class="pv25 color-3 text-center" >
				<?php echo boostrapHtml::createFaButton('fa-print fa-4x color-2')?>
				<h2 class="mt15 mb25"><b><?php echo CL_DOWNLOAD_CATALOGUE?></b></h2>
				<?php echo $objDownloadList->render();?>
			</div>
		</div>
	</div>    
</div> <!-- /container -->