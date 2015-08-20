<?php include(DIR_FS_BLOCKS."widgets_boostrap_slider.inc.php")?>
<?php include(DIR_FS_BLOCKS."widgets_bc.inc.php");?>
<?php echo $objFSSliderHtml->render();?>
<div class="bck-color-2">
	<div class="container pageContent pf20">
		<h1 class="color-3 mb20"><?php echo  $objPage->Name?></h1>
		<p><?php echo  $objPage->Descrizione?></p>
	</div> <!-- /container -->
</div>
<div class="container content mv25 pt25">
	<div class="row ">
		<div class="col-xs-12"><?php echo $objCategoryList->render();?></div>
	</div>    
</div>
<?php if ($objItemsDocList->Data ): ?>
	<div class="bck-color-2"> 
		<div class="container content">
			<div class="row ">
				<div class="col-xs-12">
					<div class="pv25 color-3 text-center" >
						<a href="<?php echo ma_get_doc_from_repsitory( $objItemsDocList->Data[0]->Doc ) ?>">
							<?php echo boostrapHtml::createFaButton('fa-print fa-4x color-2')?>
							<h2 class="mt15 mb25"><b><?php echo CL_DOWNLOAD_CAT?></b></h2>
						</a>
					</div>
				</div>
			</div>    
		</div>
	</div>
<?php endif?>
