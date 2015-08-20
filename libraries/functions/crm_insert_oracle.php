<?php
$curTab="";
$curArr = array ();
$tabArr = array ();
$correnteMulti=array();
array_push ($curArr,$_POST);
$db_ora=$db;
while (list($label) = each($_POST)){

// se il post  non e di un array
if(!is_array($_POST[$label])){
   $curItem=explode('_',$label);
   //  verifico  se  la tabella  � gi� presente nell'array
   $ce=in_array ($curItem[0],$tabArr); 
   $curItem[0];
   //se non c�  faccio il ciclo
      $miaTabellaCorrente=strtolower($curItem[0]);
   
     //  non uso   la  funzione se  inserisco  gli accessori  della   macchina
    if($curTab!=$curItem[0] && !$ce &&!empty($miaTabellaCorrente)){
	      if($db_ora->ckTable($miaTabellaCorrente)){
		  $miaTabellaCorrente;
	      $tabArr[]=strtolower($curItem[0]);
	      // echo "SELECT * FROM $miaTabellaCorrente where rownum=1";
		  $db_ora->get_results("SELECT * FROM $miaTabellaCorrente where rownum=1");
		  
	      $data=$db_ora->get_col_info("name");
	      $type=$db_ora->get_col_info("type");
          $nullCol=$dbOraObj->get_ora_col_info($miaTabellaCorrente,'NULLABLE');
          
          $numero=(!empty($_POST[$curItem[0]."_Numero"]))?$_POST[$curItem[0]."_Numero"]:0;
         
		  // ciclo  se  c'�  piu di una tipo  di insert
		  for($j=0;$j<=$numero;$j++){
		     
			 
			     $obj= new subInsert;
		         $obj->setMultiTable();
		         $obj->isOracle=1;
		         $obj->seqOracle="SEQ_".strtoupper($miaTabellaCorrente);
			 
			if(String::ma_not_null($multiTable)){

				   
	             if(in_array($miaTabellaCorrente,$multiTable)){
	               if($numero>0){
	                  if($mode=='up'){
	                     if($miaTabellaCorrente==TABLE_CMR_SCHEDA_TEMPLATEVOCI){
						        $curArr[0][$miaTabellaCorrente.'_IdTemplate:'.($j+1)]=$corrente;
						 }
	                     else   echo $curArr[0][$miaTabellaCorrente.'_IdOpzioni:'.($j+1)]=$corrente;
	                  }
	                 }
	                 else {
	                   if($mode=='up'){
	                     if($miaTabellaCorrente==TABLE_CMR_SCHEDA_TEMPLATEVOCI){$curArr[0][$miaTabellaCorrente.'_IdTemplate']=$corrente; }
	                     else $curArr[0][$miaTabellaCorrente.'_IdOpzioni']=$corrente;
	                   }
	                 };
	              }
			  }




			 if($numero>0){
			    $obj->setSep(':');
			    $obj->setCiclo($j+1);
                $obj->setCurArray($curArr[0],'_',1);
			 }
			 //altrimenti senza :
			 $obj->setCurArray($curArr[0],'_',1);
			 $obj->getData($data,$type,$nullCol);
             $obj->getQuery($mode,$miaTabellaCorrente);
       
             echo $upData=$obj->getUpdata();
             $upData."<br>";
			 $qOk=	$db_ora->query($upData);
        
             if($qOk==1) {
             if(String::ma_not_null($multiUpdate))if(in_array($miaTabellaCorrente,$multiUpdate)){
                  "<br>";
			      $corrente=($db_ora->insert_id)?$db_ora->insert_id:$IdAna;

              }
			  $correnteMulti[]=$db_ora->insert_id;
             }
			
			 
			 
     	  }
	  }
   }
 }
 $curTab=$curItem[0];
}
$Id=($mode=='up' && empty($corrente) && $obj->seqOracle)?$db_ora->insert_id($obj->seqOracle)-1:$Id;

//eseguo  anche l'inserimento  delle  relazioni
?>