<?php  

if(IS_LIVE==1) error_reporting(E_ERROR);  
session_start();  
include_once(DIR_FS_FUNCTIONS.'autoload.php');
include_once(DIR_FS_VENDOR_CLASSES.'autoload.php'); 

include_once(DIR_FS_CONFIG."filenames.php");  
include_once(DIR_FS_CMS_LANG.LANG_PRE."/common_def.php");  
include_once(DIR_FS_CMS_LANG.LANG_PRE."/userMessage.php"); 
include_once(DIR_FS_COMMONLIB_CLASSES."String.class.php");  
include_once(DIR_FS_COMMONLIB_CLASSES."ma_Tools.php");  
include_once(DIR_FS_COMMONLIB_CLASSES."date_time.class.php"); 
 
include_once(DIR_FS_FUNCTIONS.'base.php');  
include_once(DIR_FS_FUNCTIONS.'seo.php');  
include_once(DIR_FS_FUNCTIONS.'sessions.php');  
 
include_once(DIR_FS_FUNCTIONS.'html_helper.inc.php');
include_once(DIR_FS_COMMONLIB_CLASSES."getFile.class.php");  	    

 	
include_once(DIR_FS_CONFIG."db_conf.inc.php");	 
include_once(DIR_FS_COMMONLIB_CLASSES.'browser_detection.php');  
include_once(DIR_FS_COMMONLIB_CLASSES.'userTracker.class.php');  
include_once(DIR_FS_CONFIG."database_tables.php");  
include_once(DIR_FS_CONFIG.'website_conf.inc.php');  
include(DIR_FS_CONFIG."pages.php");  
include(DIR_FS_CONFIG."list.php");  


//login handler  
include_once(DIR_FS_CMS_INCLUDES.'login.inc.php');
include_once(DIR_FS_CMS_INCLUDES."pageHandler.inc.php");

