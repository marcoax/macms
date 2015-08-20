<?php 
//pouiio347
error_reporting(E_ALL ^ (E_NOTICE | E_STRICT | E_DEPRECATED));
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING ));
//ini_set("display_errors", E_ALL  ^ E_NOTICE);
/*
 * Nome utente: 6451592@aruba.it
Password: 0fp32d13dw 
*/
	
if($_SERVER['SERVER_NAME']=='localhost') define('HTTP_SERVER', 'http://localhost/'); // da  configurare  url server
elseif($_SERVER['SERVER_NAME']=='192.168.0.6') define('HTTP_SERVER', 'http://192.168.0.6/'); 
else define ('HTTP_SERVER','http://'.$_SERVER['SERVER_NAME'].'/');// da  configurare  url server
/***** local*****************/
if(HTTP_SERVER=='http://localhost/' or HTTP_SERVER=='http://192.168.0.6/') { //locale
	define('IS_LOCAL','1');
	define('APP_SUX','macms');
	define('DB_TYPE', 'mysql');
	define('DB_PREFIX', '');		
	if(DB_TYPE=='oracle'){
		define('DB_SMILE_SERVER_USERNAME', 'smile');
		define('DB_SMILE_SERVER_PASSWORD', 'smile');
		define('DB_SMILE', 'BACKUP_815'); // reale
		define('DB_BACKUP', 'ICOM_815'); // back_up
	}
	else {
		define('DB_SERVER', 'localhost'); // eg, localhost - should not be empty
		define('DB_SERVER_USERNAME', 'root');
		if($_SERVER['DOCUMENT_ROOT']=='C:/web' )define('DB_SERVER_PASSWORD', 'gafi');
		else  define('DB_SERVER_PASSWORD', '');
		define('DB_DATABASE', 'cms_'.APP_SUX);
	}
	define('DIR_FS_ROOT', $_SERVER['DOCUMENT_ROOT'].'/'); // directory del file  system
	define('DIR_FS_CATALOG', DIR_FS_ROOT.'/'.APP_SUX.'/'); // da  configurare cartella  del file system del cms
	define('DIR_FS_SITE', DIR_FS_ROOT.APP_SUX.'/'); // da  configurare cartella  del file system con il sito
	define('DIR_WS_CATALOG',HTTP_SERVER.APP_SUX.'/'); // da  configurare  cartella   cms
	define('DIR_WS_SITE',HTTP_SERVER.APP_SUX.'/'); // da  configurare  url  del  front-end
	define('DIR_WS_HOMEPAGE',DIR_WS_CATALOG.'');
	// fylesytem reposotory
	define('DIR_WS_REPOSITORY',DIR_WS_SITE.'public/');// da  configurare  se cartella  diversa da public
	define('DIR_FS_THUMB','thumb_'); //  just image suffix
	// web server repositoty
	define('DIR_FS_REPOSITORY',DIR_FS_SITE.'/public/'); // da  configurare  se cartella  diversa da public
	define('DIR_WS_THUMB','thumb_');
}
else {
	// sito live
	define('APP_SUX','');
	define('DB_TYPE', 'mysql');
	if(DB_TYPE=='oracle'){
		define('DB_SMILE_SERVER_USERNAME', 'smile');
		define('DB_SMILE_SERVER_PASSWORD', 'smile');
		define('DB_SMILE', 'ICOM_815'); // reale
		define('DB_BACKUP', 'ICOM_815'); // back_up
	}
	else {
		
	    define('DB_PREFIX', '');
	    define('DB_SERVER', 'internal-db.s11010.gridserver.com');  // da configurare per  db
	    define('DB_SERVER_USERNAME', 'db11010_userLMC');// da configurare per  db
	    define('DB_SERVER_PASSWORD', '4w;8/CcMm+t');   // da configurare per  db
	    define('DB_DATABASE', 'db11010_lmc');  // da configurare per  db
	
	}
	define('IS_LIVE','1_');
	define('DIR_FS_ROOT', $_SERVER['DOCUMENT_ROOT'].''); // directory del file  system
	define('DIR_FS_CATALOG', DIR_FS_ROOT.''.APP_SUX.'/'); // da  configurare cartella  del file system del cms
	define('DIR_FS_SITE', DIR_FS_ROOT.APP_SUX.'/'); // da  configurare cartella  del file system con il sito
	define('DIR_WS_CATALOG',HTTP_SERVER.'stage/'); // da  configurare  url  del  front-end
	// fylesytem reposotory
	define('DIR_FS_REPOSITORY',DIR_FS_ROOT.'/public/');
	define('DIR_FS_THUMB','thumb_'); //  just image suffix
	define('DIR_WS_SITE',HTTP_SERVER.APP_SUX.''); // da  configurare  url  del  front-end
	define('DIR_WS_HOMEPAGE',DIR_WS_CATALOG.'');
	// web server repositoty
	define('DIR_WS_REPOSITORY',HTTP_SERVER.'/public/');
	define('DIR_WS_THUMB','thumb_');
	
}


define( 'DS'             , DIRECTORY_SEPARATOR );
//********************************web server path *****************/
define('DIR_WS_ASSETS',    DIR_WS_SITE . 'assets/');
define('DIR_WS_CSS',       DIR_WS_ASSETS . 'css/');
define('DIR_WS_JS',        DIR_WS_ASSETS . 'js/');
define('DIR_WS_PLUGIN',    DIR_WS_ASSETS . 'plugins/');
define('DIR_WS_INCLUDES',  DIR_WS_SITE . 'includes/');
define('DIR_WS_STAMPA',    DIR_WS_INCLUDES);
define('DIR_WS_TEMPLATES', DIR_WS_SITE . 'templates/');
define('DIR_WS_IMAGES',    DIR_WS_ASSETS . 'img/');
define('DIR_WS_CKEDITOR',  DIR_WS_SITE . 'ckeditor/');
define('DIR_WS_CLASS',     DIR_WS_SITE . 'libraries/class/');
define('DIR_WS_LANG',      DIR_WS_SITE . 'languages/');
define('DIR_WS_REPOSITORY_DOC',DIR_WS_REPOSITORY.'doc/'); // da  configurare contiene url  files o le immagini uplodate upload

//******************************** file system path ****************/
define('DIR_FS_CONFIG',    DIR_FS_CATALOG . 'config/');
define('DIR_FS_INCLUDES',  DIR_FS_CATALOG . 'includes/');
define('DIR_FS_MODULES',   DIR_FS_CATALOG . 'modules/');
define('DIR_FS_VIEWS',     DIR_FS_CATALOG . 'views/');

define('DIR_FS_LIB',       DIR_FS_CATALOG . 'libraries/');
define('DIR_FS_COMMONLIB_CLASSES', DIR_FS_LIB . 'class/');
define('DIR_FS_VENDOR_CLASSES'   , DIR_FS_LIB . 'vendor/');
define('DIR_FS_FUNCTIONS', DIR_FS_LIB . 'functions/');
define('DIR_FS_APPLICATION_CLASS', DIR_FS_CATALOG . 'application/');
define('DIR_FS_BLOCKS',    DIR_FS_INCLUDES . 'blocks/');
define('DIR_FS_LANG',      DIR_FS_CATALOG . 'languages/');
define('DIR_FS_TEMPLATES', DIR_FS_CATALOG . 'templates/');
define('DIR_FS_TEMPLATE_HTML', DIR_FS_TEMPLATES . 'html/');

//******************************** cms ***************************/
define('DIR_WS_CMS',          DIR_WS_SITE . 'admin/');
define('DIR_WS_CMS_CSS',      DIR_WS_CMS . 'assets/css/');
define('DIR_WS_CMS_JS',       DIR_WS_CMS . 'assets/js/');
define('DIR_WS_CMS_IMAGES',   DIR_WS_CMS . 'assets/images/');
define('DIR_WS_CMS_INCLUDES', DIR_WS_CMS . 'includes/');
define('DIR_WS_CMS_BLOCKS',   DIR_WS_CMS_INCLUDES . 'blocks/');

define('DIR_FS_CMS',          DIR_FS_SITE . 'admin/');
define('DIR_FS_CMS_INCLUDES', DIR_FS_CMS . 'includes/');
define('DIR_FS_CMS_MODULES',  DIR_FS_CMS . 'modules/');
define('DIR_FS_CMS_VIEW',     DIR_FS_CMS . 'view/');
define('DIR_FS_CMS_BLOCKS',   DIR_FS_CMS_INCLUDES . 'blocks/');
define('DIR_FS_CMS_LANG',     DIR_FS_CMS . 'languages/');

/*************************** installation parameters ***************/
define('LANG_PRE', 'it');
define('LANG_FULL', 'Italiano');
if (DB_SERVER_PASSWORD == 'gafi') {// sito live
	define('CMS_TITLE', ' NEW smigroup cms');
	define('CMS_SMIGROUP', 'smigroup_');
	define('DB_SERVER', '62.149.150.97');
	// eg, localhost - should not be empty
} 
else define('CMS_SMIGROUP', '');

/***********************  some  application*************************/
define('DB_USE_PDO', '1');
define('DB_USE_PDO_SUFFIX', '_pdo');
