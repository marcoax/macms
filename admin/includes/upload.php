<?php
/*
Server-side PHP file upload code for HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
print_r()
*/
require('../config/configure.php');
include_once(DIR_FS_INCLUDES."commonIncludes.inc.php");
include_once(DIR_FS_CLASSLIB."resizeimage.class.php");
 require(DIR_FS_CLASSLIB.'crop/cropcanvas.class.php');

  $IdCategory="immagini";
  $Doc=$_FILES['myNomeFile'];
  $docType='img';
  $docLang=ma_getParameter('myImgLang');
  $docIdSubCategory=ma_getParameter('myImgType');

  

$fn =(isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
if ($fn) {


  $IdCategory="immagini";
  $Doc[]='';
  $Doc['name']=$fn;
  $docType='img';
  $docTitle=$fn;
  $IdEvento=ma_getParameter('Id');
  $docLang='';
  $docIdSubCategory='';

    $_POST[$fileName]=$fn;
	// AJAX call
	file_put_contents(
		DIR_FS_REPOSITORY.$docType.'/' . $fn,
		file_get_contents('php://input')
	);
	
	$pathRepository=DIR_FS_REPOSITORY.'img/';
	include(DIR_FS_CMS_MODULES.'common/common_img_resize_handler.inc.php');
	include(DIR_FS_CMS_MODULES.'common/docInsertdHandler.inc.php');
	exit();

}
else {

	// form submit
	$files = $_FILES['myNomeFile'];
    if(count($files)>0) {
	foreach ($files['error'] as $id => $err) {
		if ($err == UPLOAD_ERR_OK) {
			$fn = $files['name'][$id];
			move_uploaded_file(
				$files['tmp_name'][$id],
				DIR_FS_REPOSITORY.'img/' . $fn
			);
			echo "<p>File $fn uploaded.</p>";
		}
	}
	}

}