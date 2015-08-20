<?php if($objSez->showGallery==1):?>
	 <h3 class="borderBox"></h3>
	 <a href="#" onclick="$('#boxImmagini').toggle(); return false" class="nounder">
	 	<h3><span class="red">[+]</span> &nbsp;<?php echo  strtoupper(CL_IMAGE_GALLERY)?></h3>
	 </a>
	 <div id="boxImmagini">	
	 			<?php include(DIR_FS_CMS_BLOCKS."box_immaUploadList.inc.php");?>	
	</div>
	<div style="clear:left"></div>	
	<h3 class="separatore"></h3>	
	<?php include(DIR_FS_CMS_BLOCKS."box_ImmaList.inc.php");?>
	 	 
<?php endif?>