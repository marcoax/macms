<?php
/*
Server-side PHP file upload code for HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
print_r()
*/
include_once("../config/configure.php");
include_once(DIR_FS_CMS_INCLUDES."common_includes.inc.php");
  
  $Doc=$_FILES['myNomeFile'];
  $docLang=ma_getParameter('myDocLang');
  $docIdSubCategory=ma_getParameter('myDocType');
  $fn =(isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
  if ($fn) {
  	$Doc[]='';
  	$Doc['name']=slugifyFile($fn);
  	$docType='doc';
  	$docTitle=slugifyFile($fn);
 	$IdCategory="documenti";
  	$IdEvento=ma_getParameter('Id');
  	$IdParent=ma_getParameter('IdParent');
  	$docLang='';
  	$docIdSubCategory='';
  	$fileRepPath=DIR_FS_REPOSITORY.$docType.'/';
	
	$objPageTree=new articoli;
    $objPageTree->getTreeFromChild($IdEvento);
    if($objPageTree->arrayRevBreadCrumbsItem){
    	foreach ($objPageTree->arrayRevBreadCrumbsItem as $dir) {
			$fileRepPath.=$dir.'/';
			 if(!is_dir($fileRepPath))mkdir($fileRepPath, 0755);
		}
		
    }
	
	

	// AJAX call
	file_put_contents(
		$fileRepPath. $fn,
		file_get_contents('php://input')
	);
	$_POST[$fileName]=$docTitle;
	
	$oldFile=$fileRepPath. $fn;
	$newFile=$fileRepPath.$docTitle;
	
    rename($oldFile, $newFile);
	
	
	$pathRepository=$fileRepPath;
	include(DIR_FS_CMS_MODULES.'common/docInsertdHandler.inc.php');
	echo "<p>File $fn uploaded.</p>";
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