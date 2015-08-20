<?php

//   i dati  di un file
class getFile { 
// variabile  file  corrente
 var $curFile;
 
    function SetFile($fp){
        $this->curFile=$fp;
     }
    
	function ceckFile(){
	  	$this->ex=file_exists($this->curFile);
	    return $this->ex;
    }
	
	function getPeso(){
	  	$this->peso=filesize($this->curFile);
		
		$this->peso=round(($this->peso/1000)).' kb';
		if($this->peso>999) $this->peso=($this->peso/1000).' Mb';
		return $this->peso;
    }
	
	function getExt(){
	  $this->ext=filetype($this->curFile);
	    return $this->ext;
	}
	function round(){
	   $this->getExt();
	    $this->ext;
	}
	
	function getImma_W(){
	  $size = getimagesize ($this->curFile);
	  return $this->imma_W=$size[0];
	}
	
	function  getImma_H(){
	  $size = getimagesize ($this->curFile);
	  return $this->imma_H=$size[1];
	}
	
	function getLastMod()  {
	  return date ("d-m-Y", filemtime($this->curFile));
	
	
	}
	
	
	function ma_copy_file($file,$newFile) {
		if (!copy($file, $newFile)) {
    		$this->msg= "Errore nella copia di $file...\n";
		}
	
		else  {
    		$this->msg= "Il file $newFile è stato creato..\n";
		}
		
	}
	  
} 




 class creafile extends getFile {

    function writefile($data){
      	// open file
    	$fh = fopen($this->filename, "w") or die("Could not open file!");
    	// write to file
      	fwrite($fh,$data) or die("Could not write   to file");
    	// close file
        fclose($fh);
	}
	
	
	function setFilePath($filename){
		$root=$this->getRoot();
	    $this->filename=$root.$filename;
	    return $this->filename;
	}
	
	//setto la  root
	function getRoot() {
	   $root=$_SERVER["DOCUMENT_ROOT"];
       return $this->root=$root; 
	}
	
	
	
	function appendDataTofile($data) {
		//Imports old data
	    $handle = fopen($filename, "r");
	    $old_content = fread($handle, filesize ($this->filename));
	    fclose($handle);
	    
		//Sets up new data
	    $final_content = $data.$old_content;
	
	    //Writes new data
	    $handle2 = fopen($this->filename, "w");
	    $finalwrite = fwrite($handle2, $final_content);
	    fclose($handle2);

	}
}
?>