<div id="sub_1">
	<table class="tableForma">
		<?php echo  $objForm->createForm($objSez,$mainTab);?>
		<?php include(DIR_FS_MODULES.'common/tagHandler.inc.php')?>
	</table>
	<?php if(String::ma_not_null($Id)):?>
		<h3 class="separatore"></h3>
		<?php include(DIR_FS_BLOCKS."box_azioniDocList.inc.php");?>
		<h3 class="separatore"></h3>
		<?php include(DIR_FS_BLOCKS."box_docUploadList.inc.php");?>
	<?php endif?>
</div>