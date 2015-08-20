<?php
class  newslettertracker  extends commonQuery
{
    // ****************************************************************************
    // class constructor
    // ****************************************************************************
    function newslettertracker()
    {
        $this->tablename = TABLE_NEWSLETTERTRACKER;
        $this->suffix= 'nt';
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
        $fieldspec['Id']    =array('type' => 'integer',
                                             'size' => 5,
                                             'pkey' => 'y',
                                             'required' => 'y',
                                             'hidden' => '1',
											 'label'=>'Id',
											 'display'=>'1',
											 'session'=>'1',
											 'xml'=>1
        );
        
         $fieldspec['Email']    = array('type' =>'string',
                                          'size' =>250,
										  'max' => 255,
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_EMAIL,
										  'extraMsg'=>'',
										  'display'=>'1',
										  'view'=>1,
										  'session'=>'1',
										  'xml'=>1
        );
         
	       
	    
	
       $fieldspec['IdNewsletter']    = array('type' =>'string',
                                        'size' =>250,
										'max' => 255,
                                        'required' => '0',
                                        'hidden' => '1',
										'label'=>CL_NEWSLETTER,
										'extraMsg'=>'',
										'display'=>'1',
										'view'=>0,
										'session'=>'1',
										'xml'=>1,
      									'default_value'=>1
       );
	   
	   $fieldspec['IdNewsletterUser']    = array('type' =>'string',
                                        'size' =>250,
										'max' => 255,
                                        'required' => '0',
                                        'hidden' => '1',
										'label'=>CL_NEWSLETTER,
										'extraMsg'=>'',
										'display'=>'1',
										'view'=>0,
										'session'=>'1',
										'xml'=>1,
      									'default_value'=>1
       );
	   
	   
       
	   $fieldspec['dateCreation']  = array('type' => 'date',
                                            'size' => 10,
                                            'autoinsert' => 'n',
                                            'noedit' => 'y');
       
       
      
	   // primary key details
        $this->primary_key              = array('Id');
        // unique key details
        $this->unique_keys              = array('email','IdNewsletter');
        // default sort sequence
        //$this->Order    = $this->suffix.'.Data Desc  ';
		$this->Order    = '1';
        $this->addField = "Id";
        $this->searchField  = "Firstname";
		$this->sa="Id";
	    $this->sb="Title";
	    $this->titleItem   = 'Firstname';
        // primary key details
	    $this->primary_key              = array('Id');
	    // unique key details
	    $this->unique_keys              = array('Email,Firstname');
	    // default sort sequence
	    $this->Order                    = $this->suffix.'.dataCreazione';
	    //$this->sa="IdDocumento";
	    $this->suggestField="Email";
	 	
	   return $fieldspec;

  } // getFieldSpec_original

    // ****************************************************************************

    // ****************************************************************************
// ****************************************************************************
   
  
function  _ma_update_Tracker($IdContatto,$IdNewsletter,$email){
      global $EZSQL_ERROR;
          
      $queryT="INSERT
              INTO ".$this->tablename."
                ( Id,IdNewsletter,IdNewsletterUser,Email)
              VALUES
                (null, '".$IdNewsletter."', '".$IdContatto."', '".$email."')
               ";
               
       
       
      // $this->db->hide_errors();
       $this->db->query($queryT);
       //$this->db->hide_errors();
      // View the errors
       return $EZSQL_ERROR[0]['error_str'];
    }
    
    
     function  _ma_select_Tracker($IdNewsletter,$email){
      global $EZSQL_ERROR;
          
      $queryT="select count(*) from ".$this->tablename."  
               where IdNewsletter='".$IdNewsletter."'
               and   Email='".$email."'";
               
       return $this->db->get_var($queryT);
    }
} 
?>