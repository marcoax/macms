<div class="col-sm-8 well">
       	<?php 
	    if(file_exists(DIR_FS_CMS_VIEW.$Id_sez."/".$Id_sez.".inc.php")){
		       include_once(DIR_FS_CMS_VIEW.$Id_sez."/".$Id_sez.".inc.php");
        }
		else include_once(DIR_FS_CMS_VIEW."view_common.inc.php");
		?>
</div><!--/span-->

