<?php 
  require(DIR_FS_COMMONLIB_CLASSES.'MyUpload.php');
  require(DIR_FS_COMMONLIB_CLASSES.'crop/cropcanvas.class.php');
  require_once(DIR_FS_COMMONLIB_CLASSES.'browser_detection.php'); 
  require_once(DIR_FS_COMMONLIB_CLASSES.'userTracker.class.php');
 //   set  the  array  of  the   doc   that  i   can  upload
  $docType=array('Img#Img',
                 'ImgPop#Img',
                 'ImgPro#Img',
                 'ImgThumb#Img',
                 'ImgReference#Img',
                 'ImgBanner#Img',
                 'media#Img',
				 'Doc#Doc',
				 'Doc2#Doc',
				 'Doc3#Doc',
                 'Video#Video',
                 'Pdf#Pdf'
  );
  foreach($docType as $d){
     $curDoc=explode('#',$d);
     $d=$curDoc[0];
     $docType=$curDoc[1];
     $number_of_img=count($_FILES['my'.$d]['name']);
     if($number_of_img>0)ciclaFiles($number_of_img,$docType,'my'.$d,1);
     //$number_of_imghead=count($_FILES['my'.$d]['name']);
     //if($number_of_imghead>0)ciclaFiles($number_of_imghead,$docType,'my'.$d);
  }
 
  function ciclaFiles($numberFile,$docType,$docField,$giro=0){
    global $d;
	global $isThumb;
	global $thumbW;
	global $thumbH;

	
    $resizeMethod=(String::ma_not_null($objSez->resizeMethod))?$objSez->resizeMethod:IMAGE_RESIZEMETHOD;

   
	
    $mediaTable=(String::ma_not_null($_POST[$docField.'Table']))?$_POST[$docField.'Table']:$mainTab;
    for($i=0;$i<$numberFile;$i++){
    	
         $nomeFile = explode('\.',$_FILES[$docField]['name'][$i]);
         if($_POST[$docField.'Path'])$extraPath=$_POST[$docField.'Path'].'/';
         //$pathRepository=DIR_FS_REPOSITORY.strtolower($docType)."/";
		 if($_POST[$docField.'Path']!='documenti') $pathRepository=DIR_FS_REPOSITORY.$extraPath;
		 else $pathRepository=documenti::pathHandler('doc',$_POST[$_POST[$docField.'Path'].'_IdAzione'],0); 
         if(!is_dir($pathRepository)){
             mkdir ($pathRepository, 0777);
         }
         
         $u = new MyUpload($_FILES[$docField]['name'][$i], $_FILES[$docField]['tmp_name'][$i], $_FILES[$docField]['size'][$i]);
         $u->setDir($pathRepository);
         
         if(FILE_MAX_SIZE>1 && String::ma_not_null($_FILES[$docField]['name'][$i])){
                 $u->cls_max_filesize=FILE_MAX_SIZE;
            if($u->checkSize()!=1){
                  $u->cls_filesize;
                  
                  echo $errorMsg.="<h3>".MSG_ERROR_UPLOAD_FILE.": Max ".FILE_MAX_SIZE." Mb</h3></h3>";
            }
         }
         
      
        
        
         if($u->checkFileExists()!=1 && String::ma_not_null($_FILES[$docField]['name'][$i])){
             //$u->renameFile();
             //$_FILES[$docField]['name'][$i]=$u->cls_file_rename_to;
             
         };
         $result = $u->upload($pathRepository);
         
        
         //
         if($result==1){
                if($numberFile>1)$fileName=$mediaTable.'_'.$d.':'.($i+1); 
                else $fileName=$mediaTable.'_'.$d;
				//  se  carico  il documento  faccio anche   update
				$_FILES[$docField]['name'][$i];
				
         }
         else if($result==-1) {
           $result;
          
           return;
         }
        
         if(String::ma_not_null($_FILES[$docField]['name'][$i])){
             $_POST[$fileName]=$_FILES[$docField]['name'][$i];
             ' - '.$i.' - '.$fileName." - ".$pathRepository."<br>";
			 
		 } 
		
        // echo $pathRepository;
		//&& $_POST[$mediaTable.'_FlagThumb']==1
		if($isThumb){
		   
           // resize image
           $thumb_small_W=intval(THUMB_SMALL_W);
		   $thumb_small_H=intval(THUMB_SMALL_H);
		   $thumb_mid_W=intval(THUMB_MID_W);
		   $thumb_mid_H=intval(THUMB_MID_H);
           $thumb_big_W=intval(THUMB_BIG_W);
		   $thumb_big_H=intval(THUMB_BIG_H);
		   $slider_W=intval(SLIDER_BIG_W);
		   $slider_H=intval(SLIDER_BIG_H);
           $thumbW=($thumbW)?$thumbW:intval(THUMB_IMG_W);
		   $thumbH=($thumbH)?$thumbH:intval(THUMB_IMG_H);
 
           // banner image	
		   $bannerW=intval(BANNER_W);
		   $bannerH=intval(BANNER_H);
           
		   $rimg=new RESIZEIMAGE($pathRepository.$_POST[$fileName]);
          
          
             // semplice resize 
		   if($resizeMethod=='resize'){ 
		   	    $rimg->resize($bannerW,$bannerH,$pathRepository.'banner_'.$_POST[$fileName]);  
                $rimg->resize($thumbW,$thumbH,$pathRepository."thumb_".$_POST[$fileName]);
		        /*
		        $rimg->resize($thumb_small_W,$thumb_small_H,$pathRepository."small_".$_POST[$fileName]);
				$rimg->resize($thumb_mid_W,$thumb_mid_H,$pathRepository."mid_".$_POST[$fileName]);
		        $rimg->resize($thumb_big_W,$thumb_big_H,$pathRepository."big_".$_POST[$fileName]);
		        $rimg->resize($slider_W,$slider_H,$pathRepository.'slider_'.$_POST[$fileName]);
				 * 
				 */
                $rimg->error();
           }
           // mantiene proporzioni
           if($resizeMethod=='resizepro'){
           	    //$rimg->resize($slider_W,$slider_H,$pathRepository.'slider_'.$_POST[$fileName]);
           	    //$rimg->resize($bannerW,$bannerH,$pathRepository.'banner_'.$_POST[$fileName]);   
                $rimg->resize_limitwh($thumbW,$thumbH,$pathRepository."thumb_".$_POST[$fileName]);
		        //$rimg->resize_limitwh($thumb_small_W,$thumb_small_H,$pathRepository."small_".$_POST[$fileName]);
				//$rimg->resize_limitwh($thumb_mid_W,$thumb_mid_H,$pathRepository."mid_".$_POST[$fileName]);
			    //$rimg->resize_limitwh($thumb_big_W,$thumb_big_H,$pathRepository."big_".$_POST[$fileName]);
				$rimg->close();
                $rimg->error();
           }
           // croppa
           else {
                
                $rimg->resize_limit_to_wh($thumbW,$thumbH,$pathRepository."thumb_v_".$_POST[$fileName]);
                $curImg=$pathRepository."thumb_v_".$_POST[$fileName]; 
                $cc = new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($thumbW,$thumbH);
					$cc->saveImage($pathRepository."thumb_".$_POST[$fileName]);
                    $cc->flushImages();
                }
                
                /*
                $rimg->resize_limit_to_wh($thumb_small_W,$thumb_small_H,$pathRepository."small_v_".$_POST[$fileName]);
                $curImg=$pathRepository."small_v_".$_POST[$fileName]; 
                $cc = new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($thumb_small_W,$thumb_small_H);
				    $pathRepository."small_".$_POST[$fileName];
					$cc->saveImage($pathRepository."small_".$_POST[$fileName]);
                    $cc->flushImages();
                }
                
                
                
                $rimg->resize_limit_to_wh($thumb_mid_W,$thumb_mid_H,$pathRepository."mid_v_".$_POST[$fileName]);
                $curImg=$pathRepository."mid_v_".$_POST[$fileName]; 
                $cc = new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($thumb_mid_W,$thumb_mid_H);
					$cc->saveImage($pathRepository."mid_".$_POST[$fileName]);
                    $cc->flushImages();
                }
                
                
                $rimg->resize_limit_to_wh($thumb_big_W,$thumb_big_W,$pathRepository."prepare_".$_POST[$fileName]);
                $curImg=$pathRepository."prepare_".$_POST[$fileName]; 
                $cc = new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($thumb_big_W,$thumb_big_H);
					$cc->saveImage($pathRepository."big_".$_POST[$fileName]);
                    $cc->flushImages();
                }
                
               $rimg->resize_limit_to_wh($bannerW,$bannerH,$pathRepository."prepare_".$_POST[$fileName]);
                $curImg=$pathRepository."prepare_".$_POST[$fileName]; 
                $cc = new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($bannerW,$bannerH);
					$cc->saveImage($pathRepository."banner_".$_POST[$fileName]);
                    $cc->flushImages();
                }
				 * *
				 */
                
                unlink($curImg);
          }
          
          
           if($rimg->imgHeight >intval(IMAGE_MAX_H) or $rimg->imgWidth>intval(IMAGE_MAX_W)){
                $rimg->resize(intval(IMAGE_MAX_W),intval(IMAGE_MAX_H),$pathRepository.$_POST[$fileName]);
          }
		   
		}
     }
 }
?>