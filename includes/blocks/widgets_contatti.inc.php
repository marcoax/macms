	<h2 class="color-6 mb20 pl25"><b><?php echo CL_CONTACT?></b></h2>
	<div class="media">
		<div class="media-left"><?php echo boostrapHtml::createFaButton('fa-map-pin fa-2x color-main')?></div>
		<div class="media-body">
			<b><?php echo WEBSITE_TITLE?></b><?php echo WEBSITE_ADDRESS2?>
		</div>
	</div>
	<div class="media">
		<div class="media-left"><?php echo boostrapHtml::createFaButton('fa-phone fa-2x color-main')?></div>
		<div class="media-body">
			Tel <?php echo  WEBSITE_PHONE?><br>
			Fax <?php echo  WEBSITE_FAX?>
		</div>
	</div>
	<div class="media">
		<div class="media-left"><?php echo boostrapHtml::createFaButton('fa-envelope fa-2x color-main')?></div>
		<div class="media-body"><?php echo  ma_html_builder::ma_helper_mailto(WEBSITE_EMAIL,'color-6')?></div>
	</div>
	<div class="media">
		<div class="media-left last"><?php echo boostrapHtml::createFaButton('fa-globe fa-2x color-main')?></div>
		<div class="media-body"><a href="<?php echo WEBSITE_SITE?>" class="color-6"><?php echo WEBSITE_SITE?></a></div>
	</div>