<div id="content" class="row-fluid">
		<!-- qui genero la lista -->
    	<?php if($showList==1)echo $ele;?>
		<?php if($showList==10)include(DIR_FS_CMS_BLOCKS."actiontoolbar.inc.php")?>
		<?php if($count)include(DIR_FS_CMS_BLOCKS."paginazione.inc.php");?>
        <input type="hidden" name="mode" value="cerca">
        <input type="hidden" name="Id_sez" value="<?php echo $Id_sez?>">
        <input type="hidden" name="Id_sub" value="<?php echo $Id_sub?>">
        <input type="hidden" name="mainTab" value="<?php echo $mainTab?>">
        <input type="hidden" name="Id" value="">
        <input type="hidden" name="page" value="<?php echo $_GET['page']?>">
		<input type="hidden" name="actionType" id="actionType" value="">
</div>