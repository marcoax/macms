<?PHP
require('../config/configure.php');
$isRemote=1;
include_once(DIR_FS_INCLUDES."commonIncludes.inc.php");
$invDate=new invDate('');
//init  the  date object
/******************  gestisce le   chiamate ajax;*/
if(ma_getParameter('editorId')){
   require_once(DIR_FS_FUNCTIONS.'inPlaceAjaxHandler.inc.php');
}
else if(ma_getParameter('actionType')){
    require_once(DIR_FS_FUNCTIONS.'actionTypeAjaxHandler.inc.php');
}
else if(ma_getParameter('actionList')){
    require_once(DIR_FS_FUNCTIONS.'actionListAjaxHandler.inc.php');
} 
?>