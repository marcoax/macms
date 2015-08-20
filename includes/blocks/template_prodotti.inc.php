<?php include(DIR_FS_BLOCKS."widgets_boostrap_slider.inc.php")?>
<?php include(DIR_FS_BLOCKS."widgets_bc.inc.php");?>
<?php echo $objFSSliderHtml->render();?>
<div class="bck-color-2">
	<div class="container pageContent pf20">
		<?php echo $objBHTML->setHideTitle(true)->setShowSubTitle(true)->getSimpleRow($objPage,"col-md-6 col-lg-6","col-md-6 col-lg-6",false,false,'h1')->render()?>
		<div class="clearfix"></div>
	</div> <!-- / prodotti container -->
</div>
<div > 
	<div class="container content">
		<div class="row ">
			<div class="col-sm-3 col-md-3 pull-right">
				
				<div class="pull-right pv25">
					<ul class="list-inline color-3 ">
						<li style="vertical-align: middle"><?php echo CL_VEDI_TUTTO?></b></li>
						<li style="vertical-align: middle"><?php echo boostrapHtml::createFaButton('fa-arrows-alt fa-4x color-3')?></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3 col-md-3">
				<div class="pv25 color-3 ph15" >
					<a href="<?php echo $objHtmlMenuP->prevItemUrl?>">
					<?php echo boostrapHtml::createFaButton('fa-arrow-left fa-4x color-2 mr15')?>
					</a>
					<a href="<?php echo $objHtmlMenuP->nextItemUrl?>">
					<?php echo boostrapHtml::createFaButton('fa-arrow-right fa-4x color-2')?>
					</a>
					
				</div>
			</div>
			<div class="col-sm-6 col-md-6">
				<div class="pv25 color-3 text-center" >
					<a href="<?php echo DIR_WS_SITE?>pdf.php?lang=<?php echo $lang?>&page=<?php echo $curArticle?>" target="_new">
						<?php echo boostrapHtml::createFaButton('fa-print fa-4x color-2')?>
						<h2 class="mt15 mb25"><b><?php echo CL_DOWNLOAD_SHEET?></b></h2>
					</a>
				</div>
			</div>
			
		</div>    
	</div>
</div>
<div class="bck-color-5">
	<div class="container pageContent pf20">
	<div id ="table-box" class="table-responsive">
		<?php echo stripslashes( $objPage->Abstract )?>	
	</div>
	<?php echo stripslashes( $objPage->Intro )?>
	</div> <!-- /container dati prodotti -->
</div>
<!-- /container nav prodotti -->
<div class="bck-color-5">
	<div class="container pageContent pf20">
		<?php include(DIR_FS_BLOCKS."widgets_galleria_page.inc.php");?>
		<?php echo $htmlListProject;?>
	</div> <!-- /container galleria prodotti -->
</div>


