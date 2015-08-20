<!--=== Slider ===-->
<?php echo  $objFSSliderHtml->render();?>
<!--=== End Slider ===-->
<!--=== Content Part ===-->
<div class="container content">
	<div class="row ">
		<div class="col-xs-12">
			<div class="pv20 color-2 border-bottom-main mb25" >
				<h1 class="text-center"><b><?php echo $objPage->SubTitle?></b></h1>
			</div>
		</div>
	</div>
	<div class="row mb10"><?php echo $objCategoryList->render();?></div>
    <div class="row equal-height-columns">
		<div class="col-md-6 mb25 ">
			<div id="widgets_news_homes" class="bck-color-2 pf25 wow bounceInLeft equal-height-column">
				<h2><?php echo CL_LATEST_NEWS?></h2>
				<?php echo $htmlListNewsHome?>
			</div>
		</div>
		<div class="col-md-6 mb25">
			<div id="widgets_contatti_home" class="bck-color-main wow bounceInRight equal-height-column"><?php include(DIR_FS_BLOCKS."widgets_contatti.inc.php");?></div>
		</div>
	</div>
	
	

</div> <!-- /container -->


