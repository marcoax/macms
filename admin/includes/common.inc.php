<?php  require_once(DIR_FS_CMS_INCLUDES.'common_includes.inc.php'); if(file_exists(DIR_FS_CMS_INCLUDES.$curPage."_header.inc.php")){     require_once(DIR_FS_CMS_INCLUDES."/".$curPage."_header.inc.php"); }?><!DOCTYPE html><!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]--><!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]--><!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]--><html lang="en"> <head><meta charset="utf-8"><title><?php echo CMS_TITLE?></title><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="description" content="<?php echo CMS_DESC?>"><meta name="author" content="<?php echo CMS_AUTHOR?>"><meta name="robots" content="noindex"><!-- text fonts --><link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" /><!-- Le styles --><link rel="stylesheet" href="<?php echo  DIR_WS_CMS_CSS?>font-awesome.css"><link href="<?php echo  DIR_WS_CMS_CSS?>bootstrap.css" rel="stylesheet"><link rel="stylesheet" href="<?php echo  DIR_WS_CMS_CSS?>ma_helper.css"><link rel="stylesheet" href="<?php echo  DIR_WS_CMS_CSS?>cms_style.css"><!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --><!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--><!-- Le fav and touch icons --><link rel="shortcut icon" href="<?php echo  DIR_WS_ASSETS?>ico/favicon.ico"><!-- CSS to style the file input field as button and adjust the Bootstrap progress bars --><link rel="stylesheet" href="<?php echo  DIR_WS_CMS_CSS?>vendor/uploadifive.css"></head>