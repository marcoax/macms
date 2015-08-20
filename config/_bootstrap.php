<?php
@session_start();
include_once('configure.php');
include_once(DIR_FS_FUNCTIONS.'autoload.php');
include_once(DIR_FS_VENDOR_CLASSES.'autoload.php');
require_once(DIR_FS_CONFIG.'mesi_conf.php');
include_once(DIR_FS_CONFIG.'database_tables.php');

/**********************  INCLUDE FUNCTIONS  ********************/
require_once(DIR_FS_FUNCTIONS.'base.php');
include_once(DIR_FS_FUNCTIONS.'seo.php');  
include_once(DIR_FS_FUNCTIONS.'sessions.php');
include_once(DIR_FS_FUNCTIONS."ma_app_html_helper.inc.php"); 
 

/**********************  INCLUDE SOME OLD CLASSES  ********************/
include_once(DIR_FS_COMMONLIB_CLASSES."ma_Tools.php");
require_once(DIR_FS_COMMONLIB_CLASSES."mailer/class.phpmailer.php");  
include_once(DIR_FS_COMMONLIB_CLASSES."date_time.class.php"); 
include_once(DIR_FS_APPLICATION_CLASS."categorytree.class.php");   
require_once(DIR_FS_COMMONLIB_CLASSES."ma_html_builder.class.php");

//**********************  CONFIG WEBSITE APPLICATION  ********************/
include_once(DIR_FS_CONFIG.'website_conf.inc.php');

$webApp 	= new Application;	
$lang  		= $webApp ->config->lang;
$curArticle = $webApp ->page->curArticle;


