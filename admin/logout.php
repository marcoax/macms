<?php
 
 include_once("../config/configure.php");
 include_once(DIR_FS_CMS_INCLUDES."common.inc.php");
 session_start();
 session_destroy()
?>
<html>
<head> <title><?php echo CMS_TITLE?></title></head>
<body onload="location.href='<?php echo ma_href_link(FILENAME_HOME.'.php')?>'">
</body>
</html>