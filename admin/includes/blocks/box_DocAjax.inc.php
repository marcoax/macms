<?php if($objSez->showDocAjaxGallery==1):?>
 	<h3 class="borderBox"></h3>
 	<a href="#" onclick="$('#boxDocAjax').toggle(); return false" class="nounder">
 		<h3><span class="red">[+]</span> &nbsp;<?php echo  strtoupper(CL_DOCUMENTI)?></h3>
 	</a>
 	<div id="boxDocAjax">	
 			<?php include(DIR_FS_CMS_BLOCKS."box_DocAjaxUploadList.inc.php");?>
 			<?php include(DIR_FS_CMS_BLOCKS."box_DocAjaxList.inc.php");?>
 	</div>
<?php endif?> 