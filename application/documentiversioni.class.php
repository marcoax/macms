<?php
//classe con l'area  commerciale
class  documentiversioni extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function documentiversioni()
    {
        $this->tablename = TABLE_MEDIAVERSIONI;
        $this->suffix= 'mv';
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
       $fieldspec['Id']    = array('type' => 'integer',
                                             'size' => 5,
                                             'pkey' => 'y',
                                             'required' => 'n',
                                             'hidden' => '1',
											 'label'=>'Id',
											 'display'=>'1'
       );
	  
	   $fieldspec['IdDocumento']    = array('type' => 'integer',
                                          'size' => 8,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>'IdActivity',
										  'display'=>'1',
										   
       );
       
       $fieldspec['Versione']    = array('type' => 'integer',
                                          'size' => 8,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>'',
										  'display'=>'1',
										   
       );
       
	   $fieldspec['Doc']    =array ('type' =>'media',
											'size' =>300,
											'max' => 255,
											'pkey' => 'n',
											'required' => 'n',
											'hidden' => '0',
											'label'=>CL_DOC,
											'extraMsg'=>'',
											'display'=>'1',
											'readonly'=>'1',
											'mediaType'=>'Doc',
	   );
	   
	  
      $fieldspec['Disable']    = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>CL_DISABILITA,
											   'display'=>'1'
       ); 
       
      
       
       
       
       $fieldspec['CreatedBy']  = array('type' => 'integer',
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
       $this->primary_key= array('Id');
       // unique key details
       $this->unique_keys= array('');
       // default sort sequence
       $this->Order = $this->suffix.'.Versione DESC,'.$this->suffix.'.Doc';
	   $this->sa="Id";
	   $this->sb="Doc";
       return $fieldspec;

    } // getFieldSpec_original

   // ****************************************************************************
    function setIdDocumento($IdDocumento){
     $this->IdDocumento=$IdDocumento;
    }
    
    function setDoc($Doc){
       $this->Doc=$Doc;
    }
    
    function addItem(){
     $this->getMaxVersion();
     $qDoc="Insert 
            into ".$this->tablename."
              (IdDocumento,Versione,Doc)
            values(
               '".$this->IdDocumento."',
               '".$this->Versione."',
               '".$this->Doc."'
            )
     ";
     //$this->db->execute($qDoc);
    }
    
     function getMaxVersion(){
       $this->_ma_pre_getData();
       $this->sel=" count(*) as m ";
       $this->initWhere($this->suffix.".IdDocumento='".$this->IdDocumento."'");
       $this->getData(3);
       $this->Versione=(int)$this->Data+1;
      
     }
     
     function getList(){
       $this->_ma_pre_getData();
       $this->initWhere($this->suffix.".IdDocumento='".$this->IdDocumento."' and Disable=0");
     }
    
      
// ****************************************************************************
} // end class
// ****************************************************************************
?>