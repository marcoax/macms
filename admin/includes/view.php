<?php
require('../config/configure.php');
header("Cache-control: private"); //IE 6 Fix
header('Content-Type: text/html; charset=UTF-8');
include_once(DIR_FS_INCLUDES."commonIncludes.inc.php");
require_once(DIR_FS_CLASSLIB."form.class.php");
require_once (DIR_FS_CLASSLIB."voci.class.php");
require_once (DIR_FS_FUNCTIONS."fileUp.inc.php");
$invDate=new invDate('');
$page=ma_get_page();
$mode=$view;
require_once(DIR_FS_VIEWS.$Id_sez."/".$Id_sez."_header.inc.php");
$jsValFile=DIR_WS_JS."validazione/".$jsVal.".js";
if(String::ma_not_null($isEditorArea)){
   $isEditor='initEditor();';
   $isEditorGetData='getEditorContent();';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?php echo CMS_TITLE?></title>
<link rel="STYLESHEET" type="text/css" href="<?php echo  DIR_WS_CSS?>reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo  DIR_WS_CSS?>default.css" />
<link rel="stylesheet" href="<?php echo  DIR_WS_CSS?>modalbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo  DIR_WS_CSS?>toolbar.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo  DIR_WS_CSS?>menu.css"/> 	
<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php echo  DIR_WS_CSS?>datepicker.css"/> -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo  DIR_WS_CSS?>tree.css"/> 
<script src="<?php echo  DIR_WS_JS?>validazioneTools.js" type="text/javascript"></script>
 <script language="JavaScript" src="<?php echo $jsValFile?>" type="text/javascript"></script>   
<script src="<?php echo  DIR_WS_JSLIB?>prototype.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JSLIB?>scriptaculous.js?load=effects,controls,dragdrop"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JSLIB?>controls.js"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JSLIB?>datepicker.js"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JS?>cmstoprototype.js"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JS?>cmsAjaxHelper.js"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JSLIB?>modalbox.js"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JS?>lib/Tree.js"></script>
<script type="text/javascript">
    mode='<?php echo $mode?>';
    serverPath='<?php echo HTTP_SERVER.DIR_WS_CATALOG?>';
    //var  for  the  editor  area
    _editor_url = "<?php echo  DIR_WS_HTMLAREA?>";
    _editor_lang = "en";
	var isEditorArea='<?php echo $isEditorArea?>'
	var curPage="<?php echo ma_get_page()?>";
 </script>
<script type="text/javascript" src="<?php echo  DIR_WS_HTMLAREA?>htmlarea.js"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JS?>ma_editor_tools.js"></script>
</head>
<body onload="<?php echo $isEditor?>">
<div id="folder_fixed">
	<div id="folder_dinamic">
		<?php include(DIR_FS_INCLUDES."header.inc.php")?>
		<div id="titlebar"><?php echo $titoloItem?></div>
		<?//require(DIR_FS_FUNCTIONS."toolsUp.inc.php")?>
		<div id="content">
		    <?php if(file_exists(DIR_FS_VIEWS.$Id_sez."/boxSx_".$Id_sez.".inc.php")):?>
		           <div id="contentSx<?php echo $layoutView?>"><?require_once(DIR_FS_VIEWS.$Id_sez."/boxSx_".$Id_sez.".inc.php")?></div>
		   <?php endif
		   <div id="contentCenter<?php echo $layoutView?>">
		     <form action="<?php echo $_SERVER['PHP_SELF']?>"" method="post" name="edit" id="edit" onsubmit="validazione('<?php echo $mainTab?>');" enctype="multipart/form-data">
            <?require_once(DIR_FS_VIEWS.$Id_sez."/".$Id_sez.".inc.php");
              include(DIR_FS_BLOCKS."common_field.inc.php");
			?>
            </form>
            
		  </div>
 		   <?php if(file_exists(DIR_FS_VIEWS.$Id_sez."/boxDx_".$Id_sez.".inc.php")):?>
		     <div  id="contentDx<?php echo $layoutView?>">
                  <?require_once(DIR_FS_VIEWS.$Id_sez."/boxDx_".$Id_sez.".inc.php")?>
			 </div>
		    <?php endif
		</div>
		&nbsp;
 </div>
 &nbsp;
</div>
<script type="text/javascript">
	var mainTab="<?php echo $mainTab?>";
</script>
<?php include_once(DIR_FS_FUNCTIONS."actionTracker.php");?>
</body>
</html>