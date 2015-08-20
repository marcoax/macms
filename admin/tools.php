<?php
include_once("../config/configure.php");
include_once(DIR_FS_CMS_INCLUDES."common.inc.php");

$objSez =  new articoli();
$tablename=ma_getParameter('table');
if($tablename)$objSez->create_obj($tablename);
?>
