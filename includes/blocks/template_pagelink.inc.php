<?php include(DIR_FS_BLOCKS."widgets_bc.inc.php");?>
<?php if($objPage->Img):?>
	<div class="container">
	 	<div class="row">
			<div class="col-xs-12 img-box">
				<?php //echo ma_make_image_tt($objPage->ImgSuffix.$objPage->Img,'',$news->Name,'img-responsive',$tt='&w=1140&h=342&zc=1')?>
				<img class="img-responsive" src="<?php echo  ma_get_image_from_repsitory($objPage->ImgSuffix.$objPage->Img)?>" alt="<?php echo  stripslashes($objPage->Name)?>" border="0">
		    </div>
		</div>
	</div> <!-- /container img -->
<?php endif?>

<div class="container content">
 	<div class="row blog-page">
 	   <div class="col-md-9 md-margin-bottom-20"> 
 	   	  <div class="headline hidden-xs"><h2><?php echo  $objPage->Name?></h2></div>
 	   	  <div class="title-box-v1">
	        	<p><?php echo  $objPage->Descrizione?></p>
			</div>
 	      <?php echo $objLinksHtml->render();?>
 	      <?php if($mediahtmlListThumb):?>
		  	<div class="headline"><h2><i class="fa fa-camera"></i> Galleria Fotografica</h2></div>
		  	<?php include(DIR_FS_BLOCKS."widgets_galleria_page.inc.php")?>
		  <?php endif?>
      </div>
	   <div class="col-md-3"  id="sidebar">
	   	    <?php include(DIR_FS_BLOCKS."widgets_share.inc.php");?>
			<div class="clearfix"></div>
			<?php include(DIR_FS_BLOCKS."widgets_contatti.inc.php");?>
			<?php include(DIR_FS_BLOCKS."widgets_last_post.inc.php");?>
		</div>
	</div>
</div> <!-- /container -->

