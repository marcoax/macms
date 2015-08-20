<div id="sub_1">
	 <table class="tableForma">
	 	  <?php echo  $objForm->createForm($objSez,$mainTab);?>  
	 	  <?//include(DIR_FS_MODULES.'common/tagHandler.inc.php')?>
	</table>
	<?php if(String::ma_not_null($Id)):?>   
		<h3></h3>   
		<?php include(DIR_FS_CMS_MODULES.'common/lang_descrizione.inc.php')?>  
		<div  style="padding-left:80px"> 
			<?//include(DIR_FS_MODULES.'common/docHandler.inc.php')?> 
		</div> <?//include(DIR_FS_MODULES.'common/docHandlerList.inc.php')?>
 	<?php endif?> 
 </div>