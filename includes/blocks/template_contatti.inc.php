<?php include(DIR_FS_BLOCKS."widgets_bc.inc.php");?>
<div class="container content mv25">
	<div class="row">
		<div class="col-sm-6  mb25-max-sm">
			<h2 class="mb15"><b><?php echo $objPage->SubTitle?></b></h2>
			<div id="widgets_contatti" class="mb25 mb15-max-sm">
				<!-- About Description -->
				<div class="media">
					<div class="media-left"><?php echo boostrapHtml::createFaButton('fa-map-marker fa-3x color-3')?></div>
					<div class="media-body">
						<b><?php echo WEBSITE_TITLE?><?php echo WEBSITE_ADDRESS2?></b>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><?php echo boostrapHtml::createFaButton('fa-phone fa-3x color-3')?></div>
					<div class="media-body">
						Tel <?php echo  WEBSITE_PHONE?><br>
						Fax <?php echo  WEBSITE_FAX?>
					</div>
				</div>
				<div class="media">
					<div class="media-left"><?php echo boostrapHtml::createFaButton('fa-envelope fa-3x color-3')?></div>
					<div class="media-body">
						<?php echo  ma_html_builder::ma_helper_mailto(WEBSITE_EMAIL,'color-main')?>
					</div>
				</div>
				<div class="media">
					<div class="media-left last"><?php echo boostrapHtml::createFaButton('fa-globe fa-3x color-3')?></div>
					<div class="media-body">
						<a href="<?php echo WEBSITE_SITE?>" class="color-main"><?php echo WEBSITE_SITE?></a>
					</div>
				</div>
			</div>
			<?php echo  $objPage->Descrizione?>
		
		</div>
		<div class="col-sm-6 mt15-max-sm" role="navigation" id="sidebar">
			<!-- Google Map -->
			 <div id="map" class="map"></div><!---/map-->
			<!-- End Google Map -->
		</div>
	</div>
</div> <!-- /container -->