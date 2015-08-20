<?php
header('Content-Type: text/html; charset=UTF-8');
include_once(DIR_FS_FUNCTIONS.'autoload.php');
include_once(DIR_FS_VENDOR_CLASSES.'autoload.php');
include_once(DIR_FS_COMMONLIB_CLASSES."String.class.php"); 
include_once(DIR_FS_COMMONLIB_CLASSES."Tool.class.php");
require_once(DIR_FS_FUNCTIONS.'base.php');
include_once(DIR_FS_FUNCTIONS.'seo.php');  
include_once(DIR_FS_FUNCTIONS.'sessions.php');  
   
require_once(DIR_FS_CONFIG.'mesi_conf.php');
include(DIR_FS_CONFIG.'database_tables.php');

include_once(DIR_FS_COMMONLIB_CLASSES."ma_Tools.php");  
include_once(DIR_FS_COMMONLIB_CLASSES."date_time.class.php"); 
include_once(DIR_FS_COMMONLIB_CLASSES."commonQuery_PDO.class.php"); 
include_once(DIR_FS_APPLICATION_CLASS."categorytree.class.php");   
	
//include_once(DIR_FS_APPLICATION_CMS."options.class.php");
include(DIR_FS_CONFIG.'website_conf.inc.php');
include_once(DIR_FS_FUNCTIONS."ma_page_utility.inc.php");

include(DIR_FS_LANG.$lang.'.lang.inc.php');

include_once(DIR_FS_COMMONLIB_CLASSES."pager.class.php");
require_once(DIR_FS_COMMONLIB_CLASSES."ma_html_builder.class.php");
require_once(DIR_FS_COMMONLIB_CLASSES."mailer/class.phpmailer.php");
require_once(DIR_FS_APPLICATION_CLASS.'emailHandler.class.php');
include_once(DIR_FS_FUNCTIONS."ma_app_html_helper.inc.php");
