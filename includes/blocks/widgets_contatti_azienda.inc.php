<div class="container content mb25">
	<div class="row ">
		<div class="col-xs-12">
			<div class="pv25 color-3" >
				<h1 class="text-center"><b><?php echo CL_CONTATTA_LA_MODERNA?></b></h1>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="media  wow bounceInRight">
				<div class="media-left "><?php echo boostrapHtml::createFaButton('fa-envelope fa-4x color-2 pr5')?></div>
				<div class="media-body ">
					<h6 class="mt10"><?php echo CL_FOR_INFO?></h6>
					<b class="x-big"><?php echo  ma_html_builder::ma_helper_mailto(WEBSITE_EMAIL,'color-main')?></b>
				</div>
			</div>	
		</div>
		<div class="col-xs-12 col-sm-6 mt20-xs">
			<div class="media  wow bounceInLeft">
				<div class="media-left  mr15"><?php echo boostrapHtml::createFaButton('fa-phone fa-4x color-2 pr5')?></div>
				<div class="media-body">
					<h6 class=""><?php echo CL_CALL?></h6>
					<b class="x-big">Tel <?php echo  WEBSITE_PHONE?></b><br/>
					<b class="x-big">Fax <?php echo  WEBSITE_FAX?></b>
				</div>
			</div>
		</div>
	</div>
    
</div> <!-- /container -->