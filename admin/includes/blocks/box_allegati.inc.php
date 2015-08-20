<?php if(String::ma_not_null($Id) && $objSez->showDocGallery==1):?>
<div class="borderBox boxContainer">
	<a href="#" onclick="$('#boxAllegati').toggle(); return false" class="nounder">
		<h3><span class="red">[+]</span> &nbsp;<?php echo CL_DOC_GALLERY?></h3>
    </a>	
	<div id="boxAllegati">		
		<?php include(DIR_FS_CMS_BLOCKS."box_docUploadList.inc.php");?>		
		<h3 class="separatore"></h3>		
		<?php include(DIR_FS_CMS_BLOCKS."box_docList.inc.php");?>	
	</div> 
   <br> <br> 
</div> 
<?php endif?>