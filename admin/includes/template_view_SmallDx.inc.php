
    <div class="col-sm-8 well">
    	
    	<div id="requiredBox"><span class="badge badge-info pull-right"> * <?php echo  MSG_HELP_REQUIRED?></span></div>
        <br>
    	<?php 
	    if(file_exists(DIR_FS_CMS_MODULES.$Id_sez."/".$Id_sez.".inc.php")){
		       include_once(DIR_FS_CMS_MODULES.$Id_sez."/".$Id_sez.".inc.php");
        }
		else include_once(DIR_FS_CMS_MODULES."edit_common.inc.php");
		?>

	
    </div><!--/span-->
    <div id="boxDx" class="span3">
          <div class="well sidebar-nav mid">
          <?php if(file_exists(DIR_FS_CMS_MODULES.$Id_sez."/boxDx_".$Id_sez.".inc.php")  && $isModal!=1) 
             require_once(DIR_FS_CMS_MODULES.$Id_sez."/boxDx_".$Id_sez.".inc.php");
          ?>
		  </div><!--/.well -->
    </div><!--/span-->
