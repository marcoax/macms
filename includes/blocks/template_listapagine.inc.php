<?php include(DIR_FS_BLOCKS."widgets_boostrap_slider.inc.php")?>
<?php include(DIR_FS_BLOCKS."widgets_bc.inc.php");?>
<?php echo $objFSSliderHtml->render();?>
<div class="container content mb25">
	<div class="row ">
		<div class="col-xs-12">
			<div class="pv25 color-3 text-center" >
				<?php echo boostrapHtml::createFaButton('fa-file-image-o fa-4x color-2')?>
				<h2 class="mt15 mb25"><b><?php echo CL_SFOGLIA_CATALOGUE?></b></h2>
				<?php echo $objDownloadList->render();?>
			</div>
		</div>
	</div>    
</div> <!-- /container --