<?php
include_once("../config/configure.php");
include_once(DIR_FS_CMS_INCLUDES."common_includes.inc.php");
include_once(DIR_FS_COMMONLIB_CLASSES."resizeimage.class.php");
require(DIR_FS_COMMONLIB_CLASSES.'crop/cropcanvas.class.php');
  
// Set the uplaod directory

//print_r( $_REQUEST);
// Set the allowed file extensions
$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions

$verifyToken = md5('unique_salt' . $_POST['timestamp']);
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	  $fileName              ='filename';
	  $_POST['filename']     =$_FILES['Filedata']['name'];   
	  $tempFile              = $_FILES['Filedata']['tmp_name'];
	  $IdCategory            ="immagini";
	  $Doc[]                 ='';
	  $docType               ='img';
	  $docTitle              = $_POST['filename'] ;
	  $Doc['name']           = $_FILES['Filedata']['name'];
	  $IdEvento              = ma_getParameter('Id');
	  $docLang               = ma_getParameter('myImgLang');
      $docIdSubCategory      = ma_getParameter('myImgType');
	  //mkdir(DIR_FS_REPOSITORY.$docType.'/');
	  $pathRepository = DIR_FS_REPOSITORY.$docType.'/';
	  $targetFile     = $pathRepository . $_FILES['Filedata']['name'];
	  // Validate the filetype
	  $fileParts = pathinfo($_FILES['Filedata']['name']);
	  if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
			move_uploaded_file($tempFile, $targetFile);
			include(DIR_FS_CMS_MODULES.'common/common_img_resize_handler.inc.php');
		    include(DIR_FS_CMS_MODULES.'common/docInsertdHandler.inc.php');
			echo $IdDocumento;
	
	   } else {
	
			// The file type wasn't allowed
			echo 'Invalid file type.';
	
		}
	}
