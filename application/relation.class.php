<?php
class  relation  extends commonQuery
{
    // ****************************************************************************
    // class constructor
    // ****************************************************************************
    function relation()
    {
        $this->tablename= TABLE_RELATION;
        $this->suffix= $this->tablename;
        $this->commonQuery();
        $this->fieldspec = $this->getFieldSpec_original();

    } // template
    // ****************************************************************************
    function getFieldSpec_original ()
    // set the specifications for this database table
    {
        $this->primary_key      = array();
        $this->unique_keys      = array();
        $this->child_relations  = array();
        $this->parent_relations = array();
		global $Id_sub;
        global $Id_sez;
		
       //
 	$fieldspec['Id']= array('type' =>'string',
 					'size' =>1,
 					'h' =>'',
					'max' => 10,
 					'pkey' => 'n',
 					'required' => '0',
 					'hidden' => '0',
 					'label'=>CL_ID,
 					'extraMsg'=>'',
 					'display'=>'1',
 					'devMsg'=>'',
 					 'json'=>1 
									 
	    );
	//Tipo Relazione
 	$fieldspec['Dominio']= array('type' =>'string',
 					'size' =>1,
 					'h' =>'',
					'max' => 255,
 					'pkey' => 'n',
 					'required' => '0',
 					'hidden' => '0',
 					'label'=>CL_DOMINIO,
 					'extraMsg'=>'',
 					'display'=>'1',
 					'devMsg'=>'Tipo Relazione'
									 
	    );
	//Oggetto a
 	$fieldspec['IdObjecta']= array('type' =>'string',
 					'size' =>1,
 					'h' =>'',
					'max' => 5,
 					'pkey' => 'n',
 					'required' => '0',
 					'hidden' => '0',
 					'label'=>CL_IDOBJECTA,
 					'extraMsg'=>'',
 					'display'=>'1',
 					'devMsg'=>'Oggetto a'
									 
	    );
	//Oggetto b
 	$fieldspec['IdObjectb']= array('type' =>'string',
 					'size' =>1,
 					'h' =>'',
					'max' => 5,
 					'pkey' => 'n',
 					'required' => '0',
 					'hidden' => '0',
 					'label'=>CL_IDOBJECTB,
 					'extraMsg'=>'',
 					'display'=>'1',
 					'devMsg'=>'Oggetto b'
									 
	    );
	//Valore  della   relazione non  obbligatorio
 	$fieldspec['Valore']= array('type' =>'string',
 					'size' =>1,
 					'h' =>'',
					'max' => 255,
 					'pkey' => 'n',
 					'required' => '0',
 					'hidden' => '0',
 					'label'=>CL_VALORE,
 					'extraMsg'=>'',
 					'display'=>'1',
 					'devMsg'=>'Valore  della   relazione non  obbligatorio',
 					'json'=>1 
									 
	    );
	//Ordinamento
 	$fieldspec['Sort']= array('type' =>'string',
 					'size' =>1,
 					'h' =>'',
					'max' => 10,
 					'pkey' => 'n',
 					'required' => '0',
 					'hidden' => '0',
 					'label'=>CL_SORT,
 					'extraMsg'=>'',
 					'display'=>'1',
 					'devMsg'=>'Sort',
 					'json'=>1 
									 
	    );
	//Attivo =0 Disabilitato =1
 	$fieldspec['Disable']= array('type' =>'boolean',
 					'size' =>1,
 					'h' =>'',
					'max' => 1,
 					'pkey' => 'n',
 					'required' => '0',
 					'hidden' => '0',
 					'label'=>CL_DISABLE,
 					'extraMsg'=>'',
 					'display'=>'1',
 					'devMsg'=>'Attivo =0 Disabilitato =1'
									 
	    );
  
        



        // primary key details
        $this->primary_key              = array('Id');
        // unique key details
        $this->unique_keys              = array('Dominio,IdObjecta,IDOBJECTB');
        // default sort sequence
        $this->Order              = $this->suffix.'.Sort,'.$this->suffix.'.Valore';
        $this->addField          = "'Dominio'";
		 $this->a          = $this->suffix.'.Id';
        $this->b         = $this->suffix.'.IdObjecta';
        $this->c         = $this->suffix.'.IdObjectb';
        $this->sa          = $this->suffix.'.Id';
        $this->sb         = $this->suffix.'.IdObjecta';
        $this->sc         = $this->suffix.'.IdObjectb';
        
        return $fieldspec;

    } // getFieldSpec_original

    function insertAll($data,$sep=","){
         $dataList=explode($sep,$data);
         foreach($dataList as $d){
       		$query="INSERT INTO ".$this->tablename."
               		            (Dominio,IdObjecta,IdObjectb)
        		         VALUES
               		   			(
                 	    		 '".$this->IdDominio."',
                       			 '".$this->IdObjecta."',
                        		 '".$d."'          	
                        )"
       		;
       		$this->db->query($query);
        }  
          
    }
	 //aggiunge  solo una  relatione
	 function addRelation($data){
     
       		$query="INSERT INTO ".$this->tablename."
               		            (Dominio,IdObjecta,IdObjectb)
        		         VALUES
               		   			(
                 	    		 '".$this->IdDominio."',
                       			 '".$this->IdObjecta."',
                        		 '".$data."'          	
                        )"
       		;
       		if(String::ma_not_null($data))$this->db->query($query);
      
          
    }
    
    //  aggiunge  una  relatione  con  valore
     function addRelationValue($data,$validate=1){
             
            //before  check  if  relatione  esist
             $dataRel=$this->ckRelation($this->IdDominio); 
             if($dataRel->Id && $validate==1){
                
             $query="UPDATE ".$this->tablename." 
	    			 SET  valore= '".addslashes($data)."' 
                 	 WHERE ".$this->primary_key[0]." = '".$dataRel->Id."'";
             }
                 
             else {
             
       		   $query="INSERT INTO ".$this->tablename."
               		            (Dominio,IdObjecta,IdObjectb,Valore)
        		         VALUES
               		   			(
                 	    		 '".$this->IdDominio."',
                       			 '".$this->IdObjecta."',
                       			 '".$this->IdObjectb."',
                        		 '".$data."'          	
                        )"
       		 ;
             }
            $query;
       		$this->db->query($query);
            
      
          
     }
    
    function  deleteAll(){
         $query=" Delete From ".$this->tablename."  
                  where  IdObjecta='".$this->IdObjecta."'
                    and  Dominio='".$this->IdDominio."'
         ";
         $this->db->query($query);
     }
    
    
    function setRelation($Dominio,$IdObjecta,$data,$sep=','){
     	$objRel =new relation;
     	$objRel->IdDominio=$Dominio;
     	$objRel->IdObjecta=$IdObjecta;
     	$objRel->insertAll($data,$sep);
    }
    
    
    function getRelation($Dominio){
    	$this->_ma_getList($Dominio);
    	if($this->IdObjecta)$this->wObj->setEqN($this->suffix.'.IdObjecta',$this->IdObjecta);
		if($this->IdObjectb)$this->wObj->setEqN($this->suffix.'.IdObjectb',$this->IdObjectb);
    }
    
    
    function ckRelation($Dominio){
    	$this->_ma_getList($Dominio);
    	if($this->IdObjecta)$this->wObj->setEqN($this->suffix.'.IdObjecta',$this->IdObjecta);
		if($this->IdObjectb)$this->wObj->setEqN($this->suffix.'.IdObjectb',$this->IdObjectb);
		$this->debug=0;
		$this->getData(2);
		return $this->Data;
    }
    
    function ma_getFastRelation($Dominio,$IdObjecta,$IdObjectb=''){
        $objRel =new relation;
     	$objRel->IdDominio=$Dominio;
     	$objRel->IdObjecta=$IdObjecta;
     	$objRel->IdObjectb=$IdObjectb;
    	$objRel->_ma_getList($Dominio);
    	if($objRel->IdObjecta)$objRel->wObj->setEqN($objRel->suffix.'.IdObjecta',$objRel->IdObjecta);
		if($objRel->IdObjectb)$objRel->wObj->setEqN($objRel->suffix.'.IdObjectb',$objRel->IdObjectb);
		$objRel->debug=0;
		$objRel->getData();
		return $objRel->Data;
    }
    
    
    
    //estra  una lista  sul  modello dei  atg
    function getTagList($value='',$limit='',$havingString){
	    $this->_ma_pre_getData();
		if($this->IdDominio)$this->initWhere($this->suffix.'.Dominio=\''.$this->IdDominio.'\'');
       
		$this->sel=$this->sc.' as "a", count('.$this->sc.') as "c"';
		$this->setGroupBy($this->sc);
		if($havingString)$this->setHaving($havingString);
		
		if(String::ma_not_null($value)){
			$this->wObj->setLike("lower(".$this->sc.")",strtolower($value));
			
		 };
		$this->Order="Count(".$this->sc.") DESC,".$this->sc;
		if($limit)$this->setLimit(0,$limit);
       
    }
    
    //  inserisce  le  relazioni in base  a  un campo di una tabella/form
    function relationHandler($fieldData,$data,$Dominio=''){
    	    $objRel =new relation;
    	  	if($fieldData) {
            $objCampi=$fieldData->fieldspec;
           	$objData=$fieldData->Data;
			$fieldId=$fieldData->primary_key[0];
           	     	
            foreach ($fieldData->fieldspec as $chiave => $valore) {
            	
    	 	    if(String::ma_not_null($valore['relation'])) {
    	 		     $objRel->IdDominio=$valore['relation'];
    	 			 $objRel->IdObjecta=$objData->$fieldId;
    	 			 $data=$objData->$chiave;
    	 			 $objRel->deleteAll();
    	 			 if(String::ma_not_null($data))$objRel->insertAll($data);	
    	 		
    	 	    }
    	    }
     	}
    }
	
	//crea una realzione da un array creato da una lista 
	function createRelationFromList($IdObjecta,$data,$relationName){
    	    $objRel =new relation;
    	 
            $objCampi=$fieldData->fieldspec;
           	$objData=$fieldData->Data;
			$fieldId=$fieldData->primary_key[0];
           	$objRel->IdDominio=$relationName;
    	 	$objRel->IdObjecta=$IdObjecta;
    	 	$objRel->deleteAll();     	
            foreach ($data as $d) {
			               $objRel->addRelation($d);	
       	    }
     	
    }
	
	function getObjRelation($IdObjecta,$relationName){
    	    $objRel =new relation;
    	 	$objRel->IdDominio=$relationName;
    	 	$objRel->IdObjecta=$IdObjecta;
			
			$objRel->_ma_pre_getData();
			$objRel->setSelect('IdObjectb as a');
		    $objRel->initWhere('Dominio="'.$relationName.'" and  IdObjecta="'.$IdObjecta.'"');
			$objRel->getData();
			
			return $objRel->Data;
     	
    }

// ****************************************************************************
}?>