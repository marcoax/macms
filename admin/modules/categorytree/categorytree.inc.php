<div id="sub_1">
	<table class="tableForma">
	<?php echo  $objForm->createForm($objSez,$mainTab);?>
	</table>
	<?php if(String::ma_not_null($Id)):?>
		<?php $Id_sez='articoli';
	          $enabledLang=$objSez->Data->Lang;
	    ?>
		<h3></h3>
		<?php include(DIR_FS_MODULES.'common/seo_descrizione.inc.php')?> 
		<h3 class="separatore"></h3>
		<?php include(DIR_FS_BLOCKS."box_immaUploadList.inc.php");?>
		<h3 class="separatore"></h3>
		<?php include(DIR_FS_BLOCKS."box_ImmaList.inc.php");?>
	<?php endif 
</div>
<?php $Id_sez='categorytree'?>