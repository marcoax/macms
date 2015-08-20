<?php
class  template  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function template()
    {
        $this->tablename = TABLE_DOMINI;
        $this->suffix= 'dd';
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

        // build array of field specifications
    $fieldspec['IdDominio']   = array('type' => 'integer',
                                          'size' => 5,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'display'=> '1',
										 
	 );
     $fieldspec['IdParent']   = array('type' => 'integer',
                                          'size' => 5,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'display' =>'0', 
										  'label'=>'',
										  'combo'=>'',
	   );
      
	  
	   $fieldspec['Dominio']    =  array('type' =>'string',
                                      'size' =>50,
									  'max' => 255,
                                      'pkey' => 'n',
                                      'required' => '0',
                                      'hidden' => '1',
									  'label'=>'',
									  'extraMsg'=>'',
									  'display'=>'1',
									  'default_value'=>'template',
       );
                                                       
       $fieldspec['Azienda']    = array('type' =>'string',
                                      'size' =>50,
									  'max' => 255,
                                      'pkey' => 'n',
                                      'required' => '0',
                                      'hidden' => '1',
									  'label'=>'',
									  'extraMsg'=>'',
									  'display'=>'1',
									  'default_value'=>DEF_AZ,
       );
     
	   $fieldspec['Label']  =  array ('type' =>'string',
                                        'size' =>250,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>CL_TITLE,
										'extraMsg'=>'',
										'display'=>'1'
	   );
	   
	    $fieldspec['Valore']  =  array ('type' =>'integer',
                                        'size' =>250,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '',
										'label'=>CL_CODE,
										'extraMsg'=>'',
										'display'=>'1'
	   );
	
	
	   $fieldspec['Sort']  =  array ('type' =>'string',
                                        'size' =>50,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '0',
										'label'=>CL_SORT,
										'extraMsg'=>'',
										'display'=>'1'
	  );
														
														
	   $fieldspec['Disable']    = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '0',
											   'label'=>CL_DISABLE,
											   'display'=>'1'
       );
	
	
	

     										
       $fieldspec['CreatedBy']   = array('type' => 'integer',
                                          'size' => 3,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'autoinsert' => 'y',
                                         'noedit' => 'y');

       $fieldspec['dateCreation']  = array('type' => 'date',
                                            'size' => 10,
                                            'autoinsert' => 'n',
                                            'noedit' => 'y');

       $fieldspec['lastUser']      = array('type' => 'integer',
                                            'size' => 3,
                                            'minvalue' => 0,
                                            'maxvalue' => 65535,
                                            'autoinsert' => 'y',
                                            'noedit' => 'y');


       $fieldspec['LastModified']  = array('type' => 'timestamp',
                                            'size' => 14,
                                            'autoinsert' => 'y',
                                            'noedit' => 'y');
	   // primary key details
       $this->primary_key              = array('IdDominio');
       // unique key details
       $this->unique_keys              = array('Dominio,Label');
       // default sort sequence
       $this->Order= $this->suffix.'.Label';
       $this->sa="Valore";
	   $this->sb="Label";
       $this->sc="Valore";
       $this->suggestField="Label";
	   $this->sezTitle    = CL_TEMPLATE;
		$this->titoloItem='Label';
       return $fieldspec;

    } // getFieldSpec_original

	
  
    function  getLabel($Id){
      $objDom= new dominio();
      $objDom->_ma_pre_getData($Id);
      $objDom->getData(2);
      return stripslashes($objDom->Data->Label);
    }

  // per  lingua
    

    // norale
	 function _ma_combo_d($Id,$dominio,$lang='en',$order="dl.Label",$Azienda=DEF_AZ){
      //$this->sel="dv.IdDominio  as a, dl.Label as b";
	  
     
      if($lang=='no'){
	       $this->tab=TABLE_DOMINI." as dv"; 
	       $this->sel="dv.".$this->sa."  as a, dv.".$this->sb." as b";
	       $this->initWhere("Dominio='".$dominio."' and FlagOb=0");
	  }
	  else if($lang=='txt'){
	      $this->tab=TABLE_DOMINI." as dv"; 
	       $this->sel="dv.".$this->sa."  as a, dv.".$this->sb." as b";
	       $this->initWhere("Dominio='".$dominio."' and FlagOb=0");
	  }
      else {
	        $this->tab=TABLE_DOMINI."
                 as dv  left join ".TABLE_DOMINI_DESCRIZIONI. ' as dl on dv.IdDominio=dl.IdOpzioni ';
	       $this->sel="dv.".$this->sa."  as a, dv.".$this->sb." as b";
	       $this->initWhere("Dominio='".$dominio."' and FlagOb=0 and Azienda='".$Azienda."' and Lingua='".$lang."'" );
	  }
      $this->Order=$order;
      $this->getData();
      $this->combo=new combo;
      $this->combo->setInv();
      $this->combo->setMode(2);
	 

      return $this->combo->makeSimpleCombo($this->Data,$Id);

    }

	
	

   function _ma_combo_parent($Id,$dominio,$lang='en',$order="dl.Label",$Azienda=DEF_AZ,$parent='',$livello=0){
      $parentW=(ma_not_null($parent))?'IdParent="'.$parent.'"':' IdParent is NULL ';
      $this->sel="dv.IdDominio  as a, dl.Label as b,dv.IdParent";
      $this->tab=TABLE_DOMINI."
                 as dv  left join ".TABLE_DOMINI_DESCRIZIONI. ' as dl on dl.IdOpzioni=dv.IdDominio ';
      $this->initWhere("Dominio='".$dominio."' and FlagOb=0 and Azienda='".$Azienda."' and Lingua='".$lang."' and ".$parentW );
      $this->Order=$order;
      $this->setGroupBy('IdDominio');

      $this->getData();
      if(String::ma_not_null($this->Data)){
         foreach($this->Data as $d){
            if(String::ma_not_null($parent))$treeLevel=$this->indent($livello);
            $selected=($Id==$d->a)?" SELECTED ":"";
            $this->comboTree.="<option value='".$d->a."' ".$selected.">".$treeLevel.$d->b."</option>";
            $this->_ma_combo_parent($Id,$dominio,$lang,$order,$Azienda,$d->a,$livello+1);
         }
      }
      return $this->comboTree;

   }


   function indent($level=0){
     $str="|";
     for ($i=0;$i<$level;$i++){
        $str.="__";
     }
     return $str;
   }
   
       // estraggo  i profili
	 function _ma_combo_p($Id,$dominio,$isReserved=1){
      //$this->sel="dv.IdDominio  as a, dl.Label as b";
	  $this->tab=TABLE_DOMINI." as dd"; 
	  $this->sel=$this->sa."  as a, ".$this->sb." as b,".$this->sc." as c";
	  $this->initWhere("Dominio='".$dominio."' and Disable=0");
	  if($isReserved!=1)$this->wObj->setDiv("FlagReserved",1);
	  $this->getData();
	  
      $this->combo=new combo;
      $this->combo->setInv();
      $this->combo->setMode(2);
	  
	  return $this->combo->makeSimpleCombo($this->Data,$Id);
	      }
    
    
   function addDomainItem($value,$domain=''){
     $this->curDomain=(ma_not_null($domain))?$domain:$this->curDomain;
     $field="Dominio,Label,CreatedBy";
     $value="'".$this->curDomain."','".ma_db_prepare_input($value)."','".ma_getParameter('uid')."'";
     $this->insertItem($field,$value);
   }
   
// ****************************************************************************
} // end class
// ****************************************************************************
?>