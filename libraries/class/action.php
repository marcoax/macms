<?php
 class Action {
 var $Multi;
 var $where;
 var $campi;
 var $valori;
 var $var_up;
 var $upData;
 var $curData;
 var $modeFull; 

 var $sep;
 var $number;
 // iserisxo tutti i valore di una tabella anche il primo se non � auto incremente
    // becco  i dati
 

	 function getData($data,$type,$nullCol=''){
	    $this->setCampi();
	    $this->setValori();
		$this->setWhere();


		for($i=0;$i<count($data);$i++){
		  // valore del campo corrente da inserire
		  //  se  � un  inser multi table
		  $curField=$_POST[$data[$i]];
		  if($this->Multi){
		   
		    //mi becco il valore  dell'array
			 $ciclo=$this->sep.$this->number;
			
			$curField=$this->curArray[$data[$i].$ciclo];
			//echo $data[$i].$ciclo;
			//echo " - ";
			//echo $curField;
			//echo "<br>";
		  }
		   $valore="";
		   if($i==0 && empty($this->modeFull))$this->where.=$data[0]."='".$curField."'";
		   else {
			       if($type[$i]=="timestamp"){$valore=date('Ymd');}
				   // se il campo � passato altrimenti valore e vuto
				   if(!empty($curField)){
                    // se  il  contuto  � un  array  faccio implode di tipo  set
                       if(is_array($curField)){
                            $curField;
                            $valore=implode($curField, ",");
                       }
                       else $valore=addslashes(trim($curField));
					   //  se  � un  campo date
					   if($type[$i]=="date"){
					        $this->isDate($valore);
					        $valore=$this->what;
					   }

			   	  }
				  if($type[$i]=="real"){
				  	  $valore=str_replace(',','.',$valore);
				  }
				 //creo la query insert solo se  non vuoto
				 if($nullCol[$i]==0 && $valore==''){
                   $this->var_up.=$data[$i]."=NULL";
                    $this->valori.="NULL";
                 }
                 else {
                     $this->var_up.=$data[$i]."='".$valore."'";
                    $this->valori.="'".$valore."'";
                 }

				  $this->campi.=$data[$i];

				  //metto la virgola a tuti tranne che all'ultimo
				   if($i<(count($data)-1)) {
				       $this->var_up.=',';

							   $this->campi.=',';
							   $this->valori.=',';
						
						
						
				  }
			 }
		 }
	 }
	 
	 
	function setValori($valori=0){
	   $this->valori='';
	   $this->valori=(!empty($valori))?$valori:$this->valori;
	   return $this->valori;
	 }
	
	 function getValori(){
	   $this->trimma($this->valori);
	   return $this->valori=$this->what;
	 }
	 
	 function setCampi($campi=0){
	   $this->campi='';
	   $this->campi=(!empty($campi))?$campi:$this->campi;
	   return $this->campi;
	 }
	 
	 function getCampi(){
	     $this->trimma($this->campi);
		 return $this->campi=$this->what;
	 }
	
	 function getVarUp(){
	   $this->trimma($this->var_up);
	   return $this->var_up=$this->what;
	 }
	 
	 
	 function setWhere(){
	     return $this->where;
	 }
	 

	function getupData(){
      return $this->upData;
	} 
	  
	function trimma($what){
	  if($what{strlen($what)-1}==',')$what=substr($what, 0, strlen($what)-1);

	  return $this->what=$what;
	}
	
	function isDate($what){
	  $arr = explode("-",$what);
	  $what=$arr[2].'-'.$arr[1].'-'.$arr[0];
	  return $this->what=$what;
	}
	
	
	function setModeFull(){
	  $this->modeFull=1;
	}
	function debug(){
	   $this->upData;
	}

}



class subInsert extends Action {
   
    // varibile  che setta  se  l'insert puo essere fatto su una multi table
  function setMultiTable(){
    $this->Multi=1;
  }
  
  
  function getQuery($mode,$tabella){
	   $this->getVarUp();
	   $this->getCampi();
	   $this->getValori();
	   $this->makeQuery($mode,$tabella);
	   
   }
	
  function setCurArray($curArr,$sep){
    $curArray= array();
	 while (list($label,$value) = each($curArr)){
     $curItem=explode($sep,$label);
	 $curEle=$curItem[1];
	 $curArray[$curEle]=$value;
	  
	 }
	 $this->curArray=$curArray;

	 return $this->curArray;
  }	
  
  function setSep($sep){
    $this->sep=$sep;
	return $this->sep;
      
  }
  
  function setCiclo($number){
    $this->number=$number;
	return $this->number;
      
  }
  //ribecco  il  contenuto  dell'array  che  cicla  id ati
  function getCurField(){
    $this->curField=$this->curTable.$this->curSep;
    return $this->curField;
  }
   
  function makeQuery($mode,$tabella){
  global $db;
	  if($mode=="edit"  ){
 			$this->upData = "
 	 			   	UPDATE 
                     $tabella
     				SET 
      				  ".$this->var_up."
	 				WHERE 
      				  $this->where
 			";

			

	    }
	   else if($mode=="up") {
			 $this->upData = "
    			INSERT INTO
      			$tabella ($this->campi)
                values   (".$this->valori.")
  	         ";
	 }
	 
	
	 return $this->upData;
		
   }
 }
?>