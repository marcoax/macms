<?php
include_once("../config/configure.php");
include_once(DIR_FS_CMS_INCLUDES."common.inc.php");
?>
<body >
<div id="msgErrorBoxModal" class="bck_verde" style="display:none"></div>
<div id="boxContenuto">     
	<div class="well">
	<div id="requiredBox" style="margin-top:10px;"><span class="badge badge-info pull-right"> * <?php echo  MSG_HELP_REQUIRED?></span></div>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="modalEdit" id="modalEdit" enctype="multipart/form-data" style="width:670px">
			
			 <?php 
				if(file_exists(DIR_FS_CMS_MODULES.$Id_sez."/".$Id_sez.".inc.php")){
					require_once(DIR_FS_CMS_MODULES.$Id_sez."/".$Id_sez.".inc.php");
				}
				else require_once(DIR_FS_CMS_MODULES."edit_common.inc.php");
				include(DIR_FS_CMS_BLOCKS."common_field.inc.php");
			 ?>
		     <div class="toolBox"><?php require(DIR_FS_CMS_BLOCKS."tools.inc.php")?></div>
		  
		</form>
	</div> 
</div>
<?php include_once(DIR_FS_FUNCTIONS."actionTracker".DB_USE_PDO_SUFFIX.".php");?>
<div id="info" class="hide"></div>
</body>
</html>