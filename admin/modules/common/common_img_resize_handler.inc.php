<?php
// resize image
           $thumb_small_W=intval(THUMB_SMALL_W);
		   $thumb_small_H=intval(THUMB_SMALL_H);
		   $thumb_mid_W=intval(THUMB_MID_W);
		   $thumb_mid_H=intval(THUMB_MID_H);
           $thumb_big_W=intval(THUMB_BIG_W);
		   $thumb_big_H=intval(THUMB_BIG_H);
           $thumbW=($thumbW)?$thumbW:intval(THUMB_IMG_W);
		   $thumbH=($thumbH)?$thumbH:intval(THUMB_IMG_H);
 
           // banner image
		   $bannerW=intval(BANNER_W);
		   $bannerH=intval(BANNER_H);
		   $pathRepository.$_POST[$fileName];
           $rimg=new RESIZEIMAGE($pathRepository.$_POST[$fileName]);
           
           $rimg->resize($thumbW,$thumbH,$pathRepository."thumb_".$_POST[$fileName]);
           if(IMAGE_RESIZEMETHOD=='resize'){   
               
		        $rimg->resize($thumb_small_W,$thumb_small_H,$pathRepository."small_".$_POST[$fileName]);
		        $rimg->resize($thumb_big_W,$thumb_big_H,$pathRepository."big_".$_POST[$fileName]);
				$rimg->resize($thumb_mid_W,$thumb_mid_H,$pathRepository."mid_".$_POST[$fileName]);
				$rimg->resize($bannerW,$bannerH,$pathRepository.'banner_'.$_POST[$fileName]);
				$rimg->resize(MIN_IMG_W,MIN_IMG_H,$pathRepository."min_".$_POST[$fileName]);
                $rimg->error();
           }
           else {
                
                $rimg->resize_limit_to_wh($thumbW,$thumbH,$pathRepository."prepare_".$_POST[$fileName]);
                $curImg=$pathRepository."prepare_".$_POST[$fileName]; 
                $cc =& new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($thumbW,$thumbH);
					$cc->saveImage($pathRepository."thumb_".$_POST[$fileName]);
                    $cc->flushImages();
                }
                
                $rimg->resize_limit_to_wh(MIN_IMG_W,MIN_IMG_H,$pathRepository."res_min_".$_POST[$fileName]);
                $curImg=$pathRepository."res_min_".$_POST[$fileName]; 
                $cc =& new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize(MIN_IMG_W,MIN_IMG_H);
				   
					$cc->saveImage($pathRepository."min_".$_POST[$fileName]);
                    $cc->flushImages();
                }
                
                $rimg->resize_limit_to_wh($thumb_small_W,$thumb_small_H,$pathRepository."res_small_".$_POST[$fileName]);
                $curImg=$pathRepository."res_small_".$_POST[$fileName]; 
                $cc =& new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($thumb_small_W,$thumb_small_H);
					$cc->saveImage($pathRepository."small_".$_POST[$fileName]);
                    $cc->flushImages();
                }
                
                
                
                $rimg->resize_limit_to_wh($thumb_mid_W,$thumb_mid_H,$pathRepository."res_mid_".$_POST[$fileName]);
                $curImg=$pathRepository."res_mid_".$_POST[$fileName]; 
                $cc =& new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($thumb_mid_W,$thumb_mid_H);
					$cc->saveImage($pathRepository."mid_".$_POST[$fileName]);
                    $cc->flushImages();
                }
                
                
                $rimg->resize_limit_to_wh($thumb_big_W,$thumb_big_H,$pathRepository."prepare_".$_POST[$fileName]);
                $curImg=$pathRepository."prepare_".$_POST[$fileName]; 
                $cc =& new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($thumb_big_W,$thumb_big_H);
					$cc->saveImage($pathRepository."big_".$_POST[$fileName]);
                    $cc->flushImages();
                }
				
				$rimg->resize_limit_to_wh($bannerW,$bannerH,$pathRepository."prepare_".$_POST[$fileName]);
                $curImg=$pathRepository."prepare_".$_POST[$fileName]; 
                $cc =& new CropCanvas();
                if ($cc->loadImage($curImg)) {
                    $cc->cropToSize($bannerW,$bannerH);
					$cc->saveImage($pathRepository."banner_".$_POST[$fileName]);
                    $cc->flushImages();
                }
				
                
                unlink($curImg);
          }
          
          
           if($rimg->imgHeight >intval(IMAGE_MAX_H) or $rimg->imgWidth>intval(IMAGE_MAX_W)){
                $rimg->resize(intval(IMAGE_MAX_W),intval(IMAGE_MAX_H),$pathRepository.$_POST[$fileName]);
          }
?>