<?php include(DIR_FS_BLOCKS."widgets_bc.inc.php");?>
<?php if($objPage->Img):?>
	<div class="container">
	 	<div class="row">
			<div class="col-xs-12 img-box">
				<img class="img-responsive" src="<?php echo  ma_get_image_from_repsitory($objPage->ImgSuffix.$objPage->Img)?>" alt="<?php echo  stripslashes($objPage->Name)?>" border="0">
		    </div>
		</div>
	</div> <!-- /container img -->
<?php endif?>
<div class="container content">
	<div class="row">
		<div class="col-sm-12 ">
			<!-- About Description -->
			<div><h1><?php echo  $objPage->Name?></h1></div>
			<div class="title-box-v1">
			<p><?php echo  $objPage->Descrizione?></p>
		</div>
			<?php echo $objPageDocHtml;?>
			<?php if( $mediahtmlListThumb):?>
				<div class="headline"><h2><i class="fa fa-camera"></i> Galleria Fotografica</h2></div>
			<?php endif?>
			<?php include(DIR_FS_BLOCKS."widgets_galleria_page.inc.php")?>
		</div>
	</div>
</div> <!-- /container -->

