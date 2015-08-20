<?php
	define("HAR_AUTO_NAME",1);	
	Class RESIZEIMAGE
	{
		var $imgFile="";
		var $imgWidth=0;
		var $imgHeight=0; 
		var $imgType="";
		var $imgAttr="";
		var $type=NULL;
		var $_img=NULL;
		var $_error="";
		
		/**
		 * Constructor
		 *
		 * @param [String $imgFile] Image File Name
		 * @return RESIZEIMAGE (Class Object)
		 */
		
   	function RESIZEIMAGE($imgFile="")
		
		 
		{
			if (!function_exists("imagecreate"))
			{
				$this->_error="Error: GD Library is not available.";
				return false;
			}

			$this->type=Array(1 => 'GIF', 2 => 'JPG', 3 => 'PNG', 4 => 'SWF', 5 => 'PSD', 6 => 'BMP', 7 => 'TIFF', 8 => 'TIFF', 9 => 'JPC', 10 => 'JP2', 11 => 'JPX', 12 => 'JB2', 13 => 'SWC', 14 => 'IFF', 15 => 'WBMP', 16 => 'XBM');
			if(!empty($imgFile))
				$this->setImage($imgFile);
		}
		/**
		 * Error occured while resizing the image.
		 *
		 * @return String 
		 */
		function error()
		{
			return $this->_error;
		}
		
		/**
		 * Set image file name
		 *
		 * @param String $imgFile
		 * @return void
		 */
		function setImage($imgFile)
		{
			$this->imgFile=$imgFile;
			return $this->_createImage();
		}
		/**
		 * 
		 * @return void
		 */
		function close()
		{
			return @imagedestroy($this->_img);
		}
		/**
		 * Resize a image to given width and height and keep it's current width and height ratio
		 * 
		 * @param Number $imgwidth
		 * @param Numnber $imgheight
		 * @param String $newfile
		 */
		function resize_limitwh($imgwidth,$imgheight,$newfile=NULL)
		{
			list($width, $height, $type, $attr) = @getimagesize($this->imgFile);
			if($width>$height){
				
				 $img_ratio_w=$width/$imgwidth;
			     $imgheight=floor($height/$img_ratio_w);
				
				
				
            }
			elseif($height>$width){
				$img_ratio_w=$height/$imgheight;
				$imgwidth=floor($width/$img_ratio_w);
				
		    }
				
			/*	
		    echo "w=".$imgwidth.' h='.$imgheight."<br>";
			echo $newfile;
			 */
			$this->resize($imgwidth,$imgheight,$newfile);
			
			
	
			
			
			/*
			else if($height > $imgheight) {
					
				$image_per = floor(($imgheight * 100) / $height);

		
			}
			 * */
			//$this->resize_percentage($image_per,$newfile);

		}
        
        
        function resize_limit_to_wh($toWidth,$toHeight,$newfile=NULL){
    
           // Get the original geometry and calculate scales
           list($width, $height, $type, $attr) = @getimagesize($this->imgFile);
           $xscale=$width/$toWidth;
           $yscale=$height/$toHeight;
           // Recalculate new size with default ratio
           if ($yscale<$xscale){
            $new_width = round($width * (1/$yscale));
            $new_height = round($height * (1/$yscale));
          }
          else {
             $new_width = round($width * (1/$xscale));
             $new_height = round($height * (1/$xscale));
         }
         $this->resize($new_width,$new_height,$newfile);
         return $imageResized;
}
		/**
		 * Resize an image to given percentage.
		 *
		 * @param Number $percent
		 * @param String $newfile
		 * @return Boolean
		 */
		function resize_percentage($percent=100,$newfile=NULL)
		{
			$newWidth=($this->imgWidth*$percent)/100;
			$newHeight=($this->imgHeight*$percent)/100;
			return $this->resize($newWidth,$newHeight,$newfile);
		}
		/**
		 * Resize an image to given X and Y percentage.
		 *
		 * @param Number $xpercent
		 * @param Number $ypercent
		 * @param String $newfile
		 * @return Boolean
		 */
		function resize_xypercentage($xpercent=100,$ypercent=100,$newfile=NULL)
		{
			$newWidth=($this->imgWidth*$xpercent)/100;
			$newHeight=($this->imgHeight*$ypercent)/100;
			return $this->resize($newWidth,$newHeight,$newfile);
		}
		
		/**
		 * Resize an image to given width and height
		 *
		 * @param Number $width
		 * @param Number $height
		 * @param String $newfile
		 * @return Boolean
		 */
		function resize($width,$height,$newfile=NULL,$isCrop=NULL)
		{
			
            if($isCrop==1)$this->crop=1;// posso  croppare
            if(empty($this->imgFile))
			{
				$this->_error="File name is not initialised.";
				return false;
			}
			if($this->imgWidth<=0 || $this->imgHeight<=0)
			{
				$this->_error="Could not resize given image";
				return false;
			}
			if($width<=0)
				$width=$this->imgWidth;
			if($height<=0)
				$height=$this->imgHeight;
				
			return $this->_resize($width,$height,$newfile);
		}
		
		/**
		 * Get the image attributes
		 * @access Private
		 * 		
		 */
		function _getImageInfo()
		{
			@list($this->imgWidth,$this->imgHeight,$type,$this->imgAttr)=@getimagesize($this->imgFile);
			$this->imgType=$this->type[$type];
		}
		
		/**
		 * Create the image resource 
		 * @access Private
		 * @return Boolean
		 */
		function _createImage()
		{
			$this->_getImageInfo($imgFile);
			if($this->imgType=='GIF')
			{
				$this->_img=@imagecreatefromgif($this->imgFile);
			}
			elseif($this->imgType=='JPG')
			{
				$this->_img=@imagecreatefromjpeg($this->imgFile);
			}
			elseif($this->imgType=='PNG')
			{
				$this->_img=@imagecreatefrompng($this->imgFile);
			}			
			if(!$this->_img || !@is_resource($this->_img))
			{
				$this->_error="Error loading ".$this->imgFile;
				return false;
			}
			return true;
		}
		
		/**
		 * Function is used to resize the image
		 * 
		 * @access Private
		 * @param Number $width
		 * @param Number $height
		 * @param String $newfile
		 * @return Boolean
		 */
		function _resize($width,$height,$newfile=NULL)
		{
		   
			if (!function_exists("imagecreate"))
			{
				echo $this->_error="Error: GD Library is not available.";
				return false;
			}

			
            
            $newimg=@imagecreatetruecolor($width,$height);
            if($this->crop==1){
            
              
               if($this->imgWidth > $this->imgHeight) $biggestSide = $this->imgWidth; //find biggest length
               else $biggestSide = $this->imgHeight;
               
                     
              //The crop size will be half that of the largest side 
              $cropPercent = .5; // This will zoom in to 50% zoom (crop)
                echo "<br>-----------------------------------<br>";
              echo $this->cropWidth= $biggestSide*$cropPercent; 
              echo "<br>";
              echo $this->cropHeight  = $biggestSide*$cropPercent; 
                 echo "<br>-----------------------------------<br>";
              echo $this->imgWidth;
              echo "<br>";
              echo $this->imgHeight; 
               
              echo "<br>-----------------------------------------------------------------------------<br>";      
              //getting the top left coordinate
              echo $this->x = ($this->imgWidth-$width/2)/2;
              echo "<br>";
              echo $this->y = ($this->imgHeight-$height/2)/2;
              echo "<br>----------------------------------<br>";
              
              @imagecopyresampled ($newimg, $this->_img, 0,0,300,225, 200, 150, $this->cropWidth,$this->cropHeight);
            
            }
            else  {
            
            @imagecopyresampled ($newimg, $this->_img, 0,0,0,0, $width, $height, $this->imgWidth,$this->imgHeight);
            }
            
            
            
            //imagecopyresampled($this->thumb, $this->myImage, 0, 0,$this->x, $this->y, $thumbSize, $thumbSize, $this->cropWidth, $this->cropHeight); 

            //imagecopyresampled ( resource dst_image, resource src_image, int dst_x, int dst_y, int src_x, int src_y, int dst_w, int dst_h, int src_w, int src_h )
			//@imagecopyresampled ($newimg, $this->_img, 0,0,30,30, $width, $height, 50,50);
			
            
            if($newfile===HAR_AUTO_NAME)
			{
				if(@preg_match("/\..*+$/",@basename($this->imgFile),$matches))
			   		$newfile=@substr_replace($this->imgFile,"_har",-@strlen($matches[0]),0);			
			}
			elseif(!empty($newfile))
			{
				if(!@preg_match("/\..*+$/",@basename($newfile)))
				{
					if(@preg_match("/\..*+$/",@basename($this->imgFile),$matches))
					   $newfile=$newfile.$matches[0];
				}
			}

			if($this->imgType=='GIF')
			{
				if(!empty($newfile))
					@imagegif($newimg,$newfile);
				else
				{
					@header("Content-type: image/gif");
					@imagegif($newimg);
				}
			}
			elseif($this->imgType=='JPG')
			{
				if(!empty($newfile))
					@imagejpeg($newimg,$newfile,100);
				else
				{
					@header("Content-type: image/jpeg");
					@imagejpeg($newimg,'',100);
				}
			}
			elseif($this->imgType=='PNG')
			{
				if(!empty($newfile))
					@imagepng($newimg,$newfile);
				else
				{
					@header("Content-type: image/png");
					@imagepng($newimg);
				}
			}
			@imagedestroy($newimg);
		}
	}
?>