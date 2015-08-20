<?php
include_once("config/configure.php");
include_once(DIR_FS_INCLUDES."commonIncludes.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?php echo CMS_TITLE?></title>
<link rel="STYLESHEET" type="text/css" href="<?php echo  DIR_WS_CSS?>reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo  DIR_WS_CSS?>default.css" />
<link rel="stylesheet" href="<?php echo  DIR_WS_CSS?>toolbar.css" type="text/css" media="screen" />  
<script src="<?php echo  DIR_WS_JS?>validazioneTools.js" type="text/javascript"></script>
<script src="<?php echo  DIR_WS_JS?>validazione/valLogin.js" type="text/javascript"></script>
<script src="<?php echo  DIR_WS_JSLIB?>prototype.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JSLIB?>scriptaculous.js?load=effects"></script>
<script language="JavaScript">
    var mainTab='<?php echo  TABLE_ADMIN_USER?>';
  </script>
</head>
<body>
<div id="folder_fixed">
	<div id="folder_dinamic">
		<?php include(DIR_FS_INCLUDES."header.inc.php")?>
		<div id="titlebar"></div>
		<div id="content">
		<div id="errorBox">
             <?php echo MSG_ERROR_NO_PER?>
             <br>
             <br>
             <br>
            <a href="javascript:history.back()"><?php echo MSG_HELP_INDIETRO?></a>
             
        </div>
		</div>
	&nbsp;
	</div>
</div>
</body>
</html>