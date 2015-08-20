<?php
//qui gestisco solo in  versioni  per  gli altri uso il modo  classico
$objDocs= new documentiversioni();
$Doc=$_FILES['myNomeFile'][name];
$_POST[$fileName]=$Doc;
$docType=(String::ma_not_null($docType))?$docType:ma_getParameter('docType');
// creo il file
if($_FILES['myNomeFile']['name']!=''){
   $u = new MyUpload($Doc, $_FILES['myNomeFile']['tmp_name'], $_FILES['myNomeFile']['size']);
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
       $IdDocumento=(String::ma_not_null($IdDocumento))?$IdDocumento:$Id;
       $objDocs->setIdDocumento($IdDocumento);
       $objDocs->setDoc($Doc);
       $objDocs->addItem();
    }
    // se � una immagine  faccio il resize 
    if($isThumb && $docType=='img'){
		 include(DIR_FS_CMS_MODULES.'common/common_img_resize_handler.inc.php');
	}
		   

  }
 else if($_FILES['myDocFile']['name']!=''){
   $u = new MyUpload($_FILES['myDocFile']['name'], $_FILES['myDocFile']['tmp_name'], $_FILES['myDocFile']['size']);
   $pathRepository=DIR_FS_REPOSITORY."doc/";
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
   if($result==100){ //  non usato aggiorna  le  versioni
       $IdDocumento=(String::ma_not_null($IdDocumento))?$IdDocumento:$Id;
       $objDocs->setIdDocumento($IdDocumento);
       $objDocs->setDoc();
       $objDocs->addItem();
    }
   
  }
?>
