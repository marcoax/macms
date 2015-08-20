<?php include(DIR_FS_BLOCKS."widgets_bc.inc.php");?>
<!-- Google Map -->
 <div id="map" class="map"></div><!---/map-->
<!-- End Google Map -->
  
<div class="container content mt25">
	<div class="row">
		<div class="col-md-9 ">
			<!-- About Description -->
			<div class="headline"><h2><?php echo CL_RICHIESTA_INFO?></h2></div>
				<div class="title-box-v1">
				<p><?php echo  $objPage->Descrizione?></p>
			</div>
			<?php include(DIR_FS_BLOCKS."widgets_modulo_informazioni.inc.php");?>
			
		</div>
		<div class="col-md-3 mt15-max-sm" role="navigation" id="sidebar">
			<h2>Informazioni</h2>
			<?php include(DIR_FS_BLOCKS."widgets_contatti.inc.php");?>
			<div class="clearfix"></div>
		</div>
	</div>
</div> <!-- /container -->