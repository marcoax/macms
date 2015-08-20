<?php
//qui gestisco solo in  versioni  per  gli altri uso il modo  classico
require_once(DIR_FS_CLASSES."documentiversioni.class.php");
$objDocs= new documentiversioni();
// seposto curIdDoc  cancello
if($_POST['curIdDoc'])$objDocs->removeItem(ma_getParameter('curIdDoc'));

$docType=ma_getParameter('docType');
// creo il file
if($_FILES['myMessaggiFile']['name']!=''){
 $numberFile=count($_FILES['myMessaggiFile']['name']);
 for($i=0;$i<$numberFile;$i++){
   $Doc=$_FILES['myMessaggiFile']['name'][$i];
   if($Doc){
 /*******************************Inserisco il documento ********************************/ 
   include(DIR_FS_MODULES.'common/docInsertdHandler.inc.php');
   /*************************************************************************************/
   $u = new MyUpload($Doc, $_FILES['myMessaggiFile']['tmp_name'][$i], $_FILES['myMessaggiFile']['size'][$i]);
   $pathRepository=DIR_FS_REPOSITORY.$docType."/";
   //verifico  che la dir attivit� ci sia
   if(!is_dir($pathRepository)){
      mkdir ($pathRepository, 0777);
   }
   //verifico  che la dir   attivit�/doctpe ci sia
   if(!is_dir($pathRepository)){
      mkdir ($pathRepository, 0777);
   }
   $u->setDir($pathRepository);
   $u->checkSize();
   //$u->checkFileExists();
   $result = $u->upload($pathRepository);
   if($result==1){
       $IdDocumento=(ma_not_null($IdDocumento))?$IdDocumento:$Id;
       $objDocs->setIdDocumento($IdDocumento);
       $objDocs->setDoc($Doc);
       $objDocs->addItem();
    }
   }
  }
}
?>