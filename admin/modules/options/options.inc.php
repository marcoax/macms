<div id="sub_1">
	<table class="tableForma">
		<?php echo  $objForm->createForm($objSez,$mainTab);?>
	</table>

<?php if(String::ma_not_null($Id)):?>
    <h3></h3>
    	<?php include(DIR_FS_MODULES.'common/lang_descrizione.inc.php')?> 
    	<?php include(DIR_FS_BLOCKS."box_Img.inc.php");?> 
<?php endif?>
</div>
