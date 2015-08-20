<?php
//qui gestisco solo in  versioni  per  gli altri uso il modo  classico
require_once(DIR_FS_CLASSES."documentiversioni.class.php");
$objDocs= new documentiversioni();
$Doc=$_FILES['myNomeFile'][name];
$docType=ma_getParameter('docType');
// creo il file
if($_FILES['myNomeFile']['name']!=''){
   $u = new MyUpload($Doc, $_FILES['myNomeFile']['tmp_name'], $_FILES['myNomeFile']['size']);
   $pathRepository=DIR_FS_REPOSITORY."/";
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
   
   $isThumb=1;
   
   if($isThumb && $docType){
		   $thumbW=($thumbW)?$thumbW:'100';
		   echo $thumbH=($thumbH)?$thumbH:'75';
		   $thumb_small_W=80;
		   $thumb_small_H=58;
		   $thumb_mid_W=200;
		   $thumb_mid_H=150;
		   $bannerW=157;
		   $bannerH=157;
		  
		   $rimg=new RESIZEIMAGE($pathRepository.$_POST[$fileName]);
		   $pathRepository.$_POST[$fileName];        
          // echo $pathRepository."small_".$_POST[$fileName];
		   $rimg->resize($thumbW,$thumbH,$pathRepository.'thumb_'.$_POST[$fileName]);
		   $rimg->resize($bannerW,$bannerH,$pathRepository.'banner_'.$_POST[$fileName]);
		   $rimg->resize($thumb_small_W,$thumb_small_H,$pathRepository."small_".$_POST[$fileName]);
		   $rimg->resize($thumb_mid_W,$thumb_mid_H,$pathRepository."mid_".$_POST[$fileName]);
		   $rimg->error();
		   
		}
   
   
   if($result==1){
       $IdDocumento=(ma_not_null($IdDocumento))?$IdDocumento:$Id;
       $objDocs->setIdDocumento($IdDocumento);
       $objDocs->setDoc($Doc);
       $objDocs->addItem();
    }
  }
?>