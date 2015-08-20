<?php
    include_once(DIR_FS_LANG.$lang.'.lang.inc.php');
    if($isRemote!=1) {
		include_once(DIR_FS_BLOCKS."pageHandler.inc.php");
		
		if(RESERVED_AREA==1 && $objPage->flagReserved==1 && ma_getParameter('loggatoFE')!=true){
		   header("location: login.php");
		}
		if(file_exists(DIR_FS_INCLUDES.$curTpl."_header.inc.php")){
		    require_once(DIR_FS_INCLUDES."/".$curTpl."_header.inc.php");
		}
		if(file_exists(DIR_FS_INCLUDES.$curPage."_header.inc.php")){
		    require_once(DIR_FS_INCLUDES."/".$curPage."_header.inc.php");
		}
	
	}
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html  xml:lang="<?php echo  $lang?>" lang="<?php echo  $lang?>"> <!--<![endif]-->  
<head>
    <title><?php echo   $objPage->pageTitle?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo  $objPage->pageTitle?>" />
	<meta name="keywords" content="<?php echo  $objPage->Meta_Keywords?>" />
	<meta name="author" content="<?php SEO_META_AUTHOR?>" />
	<meta name="google-site-verification" content="" />
    <meta property="og:title" content="<?php echo   $objPage->pageTitle?>" />
	<meta property="og:url" content="<?php echo  $objPage->curPageURL?>" />
	<meta property="og:image" content="<?php echo  DIR_WS_IMAGES?>thumb.jpg" />
	<meta property="og:description" content="<?php echo  $objPage->pageTitle?>" />
	<link rel="image_src" href="<?php echo  DIR_WS_IMAGES?>thumb.jpg"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,400italic,900italic,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cinzel:400,700' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo  DIR_WS_CSS?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo  DIR_WS_CSS?>animate.css">
    <link rel="stylesheet" href="<?php echo  DIR_WS_CSS?>ma_helper.css">
    <link rel="stylesheet" href="<?php echo  DIR_WS_CSS?>override.css">
    <link rel="stylesheet" href="<?php echo  DIR_WS_CSS?>header-default.css">
    <link rel="stylesheet" href="<?php echo  DIR_WS_CSS?>app.css">
   


      <!-- maCoockiEu -->
    <link href="<?php echo DIR_WS_CSS?>lib/maCookieEu.css" rel="stylesheet">
        <?php if(file_exists(DIR_FS_INCLUDES.$curPage."_header_css.inc.php")){
      	require_once(DIR_FS_INCLUDES."/".$curPage."_header_css.inc.php");
    }?>
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

     <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="favicon.ico" >
</head>
