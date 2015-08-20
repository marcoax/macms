<?php
class  nazioni  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function nazioni()
    {
        $this->tablename = TABLE_NAZIONI;
        $this->suffix= 'n';
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
       $fieldspec['IdNazione']   = array('type' => 'integer',
                                          'size' => 5,
                                          'minvalue' => 0,
                                          'maxvalue' => 65535,
                                          'pkey' => 'y',
                                          'required' => 'y',
                                          'hidden' => '1',
										  'display'=> '1',
										 
		);
       
	    $fieldspec['IdCode']  =  array ('type' =>'integer',
                                        'size' =>50,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'n',
                                        'hidden' => '1',
										'label'=>CL_CODE,
										'extraMsg'=>'',
										'display'=>'1'
	   );
	   
	  
	   $fieldspec['Nazione']  =  array ('type' =>'string',
                                        'size' =>250,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>CL_REGIONE,
										'extraMsg'=>'',
										'display'=>'1'
	   );
	  
      
       $fieldspec['NazioneIT']  =  array ('type' =>'string',
                                        'size' =>250,
										'max' => 255,
                                        'pkey' => 'n',
                                        'required' => 'y',
                                        'hidden' => '0',
										'label'=>CL_REGIONE,
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
       $this->primary_key              = array('IdNazione');
       // unique key details
       $this->unique_keys              = array('Sigla,IdNazione');
       // default sort sequence
       $this->Order                    = $this->suffix.'.Nazione';
       $this->sa="dominio";
	   $this->sb="Nazione";
       return $fieldspec;

    } // getFieldSpec_original
  // ****************************************************************************
    

 

// ****************************************************************************
} // end class
// ****************************************************************************

?>