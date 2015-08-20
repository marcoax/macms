<?php
include(DIR_FS_MODULES.'common/common_azioni_inc.php');
$IdOwner=$objSez->Data->CreatedBy;
if($_FILES['myNomeFile']['name']!=''){
  $IdCategory="documenti";
  $Doc=$_FILES['myNomeFile']['name'];
  include(DIR_FS_MODULES.'common/docInsertdHandler.inc.php');
  include(DIR_FS_MODULES.'common/docUploadHandler.inc.php');
}
$objForm= new cmsForm();
