<div id="sub_1"> 
<table class="tableForma" style="">
	<tr><td><?php $objForm->createForm($objSez,$mainTab);?></td></tr>  
	 
</table>  
<?php if(String::ma_not_null($Id)):?>  
	<h3></h3>        
	<?php include(DIR_FS_CMS_MODULES.'common/lang_descrizione.inc.php')?>     
	<?php include_once(DIR_FS_CMS_BLOCKS."box_Img.inc.php");?> 
	<?php endif?>
</div>
