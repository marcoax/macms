<?php 
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function user()
    {
        $this->tablename = TABLE_ADMIN_USER;
    // ****************************************************************************
    function getFieldSpec_original ()
    // set the specifications for this database table
    {
        $this->primary_key      = array();
       );
       );
       $fieldspec['Email']    = array('type' =>'string',
       );
	   $fieldspec['Username']    = array('type' =>'string',
       );
       );
       
       $fieldspec['Phone']    = array('type' =>'string',
       
       $fieldspec['Fax']    = array('type' =>'string',

    
       
	   $fieldspec['Mobile']    =array('type' =>'string',
	
       $fieldspec['Address']    = array('type' =>'string',
      );
										  'display'=>'1'
       );
                                        'size' => 600,
                                        'required' => 'y',
                                        'hidden' => '0',
										'display'=>'0',
										'label'=>'',
										'scombo'=>'Provincie',
       );
	   
	   
	    $fieldspec['IdRegione']    = array('type' => 'integer',
                                        'size' => 600,
                                        'required' => 'y',
                                        'hidden' => '1',
										'display'=>'1',
										'label'=>'',
										'combo'=>'Zone',
       );
      
        $fieldspec['IdCountry']  = array('type' =>'integer',
     	
	   $fieldspec['Lang']    = array('type' =>'string',
                                      'size' =>50,
									  'max' => 255,
                                      'required' => '0',
                                      'hidden' => '1',
									  'label'=>CL_LANG,
									  'extraMsg'=>'',
									  'display'=>'1',
									  'default_value'=>'it'
      );
      
      $fieldspec['IdStatus']    = array('type' =>'string',
                                        'size' => 600,
										'max' => 255,
                                        'required' => '0',
                                        'hidden' => '0',
										'label'=>CL_STATUS,
										'extraMsg'=>'',
										'scombo'=>'Permission',
										'display'=>'0'
       );
       
       
      $fieldspec['FlagHtml']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>CL_FLAG_EMAIL_HTML,
											   'display'=>'1'
       );
	    $fieldspec['FlagNewsletter']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>CL_FLAG_NEWSLETTER,
											   'display'=>'1'
       );
	   
	     $fieldspec['FlagNotifica']           = array('type' =>'integer',
       );
       
       $fieldspec['Disable']    = array('type' =>'boolean',
       );
      );
	);
   // primary key details

  } // getFieldSpec_original

    // ****************************************************************************

    // ****************************************************************************
// ****************************************************************************

//  estrae  gli uetnti  non aasociati ad un azione o gruppo
   function getUserNotIn($IdActivity,$Dominio){
   }
   
   function getUserByEmail($email){
   }
   function getUserByUsername($username){
    function getFastUserByAc($ac){
   //  spedisce l'email con la Pwd
	 function  sendPwd($email){
	  
	  if(!check_email_address($email)) return $msg=MSG_ERROR_EMAIL_INVALID;
	  else $msg=MSG_HELP_EMAIL_NON_PRESENTE; 

	 function generatePassword($length = 8){
			$possible = "0123456789bcdfghjkmnpqrstvwxyz-!?";
	
    function updatePwd(){
	   $q="UPDATE ".$this->tab." 
	}
   function getNotifyAdminList(){
   
    function ckUser($username,$pwd){
   }
	 
	 function updateAcces($uid) {
} 