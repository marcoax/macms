<?php
	session_start();
	include('config/configure.php');
	include(DIR_FS_INCLUDES."common.inc.php");
	
?>
<body class="<?php echo $curPage?>">
    <!-- header -->
    <?php include(DIR_FS_INCLUDES."header.inc.php")?>
     <?php
	 if(file_exists(DIR_FS_BLOCKS."template_".$objPage->Template.".inc.php"))include(DIR_FS_BLOCKS."template_".$objPage->Template.".inc.php");
     else include(DIR_FS_BLOCKS."template_normal.inc.php"); 
     ?>    
     <!-- footer -->
     <?php include(DIR_FS_INCLUDES."footer.inc.php")?>   
     
  </body>	
</html>