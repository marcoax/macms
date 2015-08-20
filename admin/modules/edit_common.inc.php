<div id="sub_1"> 
	<?php echo  $objForm->createForm($objSez,$mainTab);?>
	 <?php if(String::ma_not_null($Id)):?><h3></h3>        
	 	<?php if($objSez->hideLang!=1)include(DIR_FS_CMS_MODULES.'common/lang_descrizione.inc.php')?>    
	 	<?php include_once(DIR_FS_CMS_BLOCKS."box_Img.inc.php");?> 
	 	<?php include_once(DIR_FS_CMS_BLOCKS."box_DocAjax.inc.php");?> 
	 <?php endif?> 
</div>