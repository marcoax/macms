<?php 
$curTab="";
$curArr = array ();
$tabArr = array ();
$correnteMulti=array();
array_push ($curArr,$_POST);


while (list($label) = each($_POST)){
// se il post  non e di un array
if(!is_array($_POST[$label])){
     $curItem=explode('_',$label);
     //  verifico  se  la tabella  � gi� presente nell'array
     $ce= in_array ($curItem[0],$tabArr); 
     $curItem[0];
     //se non c�  faccio il ciclo
     $miaTabellaCorrente = strtolower($curItem[0]);
	 if($miaTabellaCorrente == 'categorytreedescrizioni' or (isset($_POST['mainTab']) && $_POST['mainTab']==$miaTabellaCorrente)) $datas[0]=1;
	 else if(!$ce && count($curItem)==2 && $miaTabellaCorrente != "id" && $miaTabellaCorrente!='') {
	 	 //require (DIR_FS_FUNCTIONS."stop-timer.php");
	 	 $TableQ ="SELECT COUNT(*) FROM information_schema.tables  WHERE table_schema = '".DB_DATABASE."' and table_name = '$miaTabellaCorrente'";
		 $STHC = $DBH->query($TableQ);
	 	 $datas= $STHC->fetch();
		 }
	// print_r($datas[0]);
	 //echo "************************<br>";
     //  non uso   la  funzione se  inserisco  gli accessori  della   macchina
     if($curTab!=$curItem[0] && !$ce &&!empty($miaTabellaCorrente) && $datas[0]==1){
     	
    
	    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
	    try{
    	  
		   $tabArr[]=strtolower($curItem[0]);
		   $STH = $DBH->query("SELECT * FROM $miaTabellaCorrente limit 0,1");
	       $datas= $STH->fetch();
	       $db->tablename=$miaTabellaCorrente;
	       $db->get_col_info("Field");
	       $data=$colNames=$db->column_names;
	       $db->get_col_info("Type");
	       $type=$db->column_names;
		   
		   $db->get_col_info("Null");
	       $nullCol=$db->column_names;
		   
		   $numero=(!empty($_POST[$curItem[0]."_Numero"]))?$_POST[$curItem[0]."_Numero"]:0;
       	   // ciclo  se  c'�  piu di una tipo  di insert
           for($j=0;$j<=$numero;$j++){
		     $obj= new subInsert;
		     $obj->setMultiTable();
			 if(in_array($miaTabellaCorrente,$multiTable)){

               if(!empty($_POST[$curItem[0]."_Numero"])){
                  if($mode=='up'){
                     if($miaTabellaCorrente==TABLE_CMR_SCHEDA_TEMPLATEVOCI){$curArr[0][$miaTabellaCorrente.'_IdTemplate:'.($j+1)]=$corrente;}
                     else $curArr[0][$miaTabellaCorrente.'_IdOpzioni:'.($j+1)]=$corrente;
                  }
                 }
                 else {
                   if($mode=='up'){
                     if($miaTabellaCorrente==TABLE_CMR_SCHEDA_TEMPLATEVOCI){$curArr[0][$miaTabellaCorrente.'_IdTemplate']=$corrente; }
                     else $curArr[0][$miaTabellaCorrente.'_IdOpzioni']=$corrente;
                   }
                 };
              }
			 if(!empty($_POST[$curItem[0]."_Numero"])){
			    $obj->setSep(':');
			    $obj->setCiclo($j+1);
                $obj->setCurArray($curArr[0],'_');
			 }
			 //altrimenti senza :
			 $obj->setCurArray($curArr[0],'_');
             $obj->getData($data,$type,$nullCol);
			 
             $obj->getQuery($mode,$miaTabellaCorrente);
             $upData=$obj->getUpdata();
             $db->execute($upData);
			
             $msgBox=MSG_HELP_SAVE_OK;
			 $db->insert_id=$DBH->lastInsertId();
			 $queryMode=($db->insert_id)?'insert':'update';
             if(in_array($miaTabellaCorrente,$multiUpdate)){
             $corrente=($db->insert_id)?$db->insert_id:$IdAna;
				 
           }
        }
     }
    catch (PDOException $e){
         //if($_SESSION['Permission']=='su')echo $e->getMessage();
    }
  }
 }
 $curTab=$curItem[0];
}
$Id=($mode=='up' && empty($corrente))?$db->insert_id:$Id;
?>