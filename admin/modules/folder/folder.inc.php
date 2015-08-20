<table class="tableForma"><?php echo  $objForm->createForm($objSez,$mainTab);?></table>
<?php if(String::ma_not_null($Id)   && $_GET['mode']!='copia'):?>        
	 	 <?php include(DIR_FS_CMS_MODULES.'common/lang_descrizione.inc.php')?>    
	 	 <?php //include_once(DIR_FS_CMS_BLOCKS."box_Img.inc.php");?> 
	 	 <?php //include_once(DIR_FS_CMS_BLOCKS."box_DocAjax.inc.php");?> 
<?php endif?>