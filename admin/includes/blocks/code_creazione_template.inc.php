<?php
// gestione  creazione template

$fileTemplate=DIR_FS_SITE."dummy.php";
$fileTemplateNew=DIR_FS_SITE.$objSez->Data->Valore.".php";
$objFile= new getFile();                                                     
$objFile->SetFile($fileTemplateNew);
if(!$objFile->ceckFile())$objFile->ma_copy_file($fileTemplate,$fileTemplateNew);
else $objFile->msg=MSG_TEMPLATE_PRESENTE;
$msgBox.="<br><br>".$objFile->msg;



