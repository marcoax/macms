<?php
class  newsletter  extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function newsletter()
    {
        $this->tablename = TABLE_NEWSLETTER;
        $this->suffix= 'nl';
        $this->commonQuery();
        $this->fieldspec = $this->getFieldSpec_original();
        $this->curNewsLetterBody;
    }
    
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
                                    'minvalue' => 0,
                                    'maxvalue' => 65535,
                                    'pkey' => 'y',
                                    'required' => 'y',
                                    'hidden' => '1',
									'display'=>'1',
        );
		
		$fieldspec['Data']    =array('type' => 'date',
                                      'size' =>80,
								      'max' => 255,
                                      'pkey' => 'n',
                                      'required' => 'y',
                                      'hidden' => '0',
									  'label'=>CL_DATE,
									  'extraMsg'=>'(formato aa-mm-yyyy)',
									  'display'=>'1',
									  'cssclass'=>'campoData',
									  'default_value'=>date('d-m-Y'),
        );
       
		$fieldspec['Destinatari']    = array ('type' =>'string',
                                          'size' =>600,
										  'h' =>350,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'n',
                                          'hidden' => '1',
										  'label'=>CL_DESTINATARI,
										  'extraMsg'=>'',
										  'display'=>'1',
                                          'cssclass'=>'campoNoeditor',
	  );
	  $fieldspec['Title']    = array ('type' =>'string',
                                          'size' =>620,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'y',
                                          'hidden' => '0',
										  'label'=>CL_OGGETTO,
										  'extraMsg'=>'',
										  'display'=>'1'
	   );
	   
	   $fieldspec['Descrizione']    = array ('type' =>'text',
                                          'size' =>610,
										  'h' =>800,
										  'max' => 255,
                                          'pkey' => 'n',
                                          'required' => 'n',
                                          'hidden' => '0',
										  'label'=>CL_TESTO,
										  'extraMsg'=>'',
										  'display'=>'1'
	  );
    
		
		$fieldspec['IdStato']           = array('type' =>'integer',
		                                    'size' =>1,
											'max' => 1,
		                                    'pkey' => 'n',
		                                    'required' => '',
		                                    'hidden' => '1',
											'label'=>CL_STATO_MESSAGGIO,
											'scombo'=>'StatoMessaggio',
											'display'=>'1'
       );
	   $fieldspec['Pub']           = array('type' =>'boolean',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>CL_PUBBLISH,
											   'display'=>'1'
       );
	  
	   $fieldspec['Disable']    = array('type' =>'integer',
		                                       'size' =>1,
											   'max' => 1,
		                                       'pkey' => 'n',
		                                       'required' => '',
		                                       'hidden' => '1',
											   'label'=>MSG_HELP_DELETE,
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
        $this->primary_key              = array('Id');
        // unique key details
        $this->unique_keys              = array('Title');
        // default sort sequence
        //$this->Order    = $this->suffix.'.Data Desc  ';
		$this->Order    = '1';
        $this->addField = "Title";
        $this->searchField  = "Title ";
		$this->sa="Id";
	    $this->sb="Title";
	    $this->titleItem   = 'Title';
        return $fieldspec;

    } // getFieldSpec_original

	/* notify_users: 
	 * 		invio email di avviso nuovo messaggio
	 * parametri:
	 * 		id del messaggio
	 * lavoro:
	 * 		cercare su users_messages tutti gli utenti a cui è diretto il messaggio
	 * 		per ogni utente bisogna:
	 * 		- raccogliere i dati (Nome intero, email, email_preference);
	 * 		- controllare la preferenza dell'email e mandare l'email di tipo corretto con i corretti replace 
	*/
	
	
	
	
    function inviaNewsletter(){
    	
		$this->_ma_pre_getData($this->IdNewsletter);
		$this->getData(2);  //estraggo dati newletter
		
		//  creo  array  destinatari
		$this->listaDestinatari=($this->emailTest)?$this->emailTest:$this->emailDestinatari;
		$this->arrayDestinatary=explode(NEWSLETTER_EMAIL_SEP,trim($this->listaDestinatari));
		// se almenu un destinatario  invio
		if(count($this->arrayDestinatary)==0)$this->msg=MSG_ERROR_NEWSLETTER_NOT_SENT;
		else {
		 	  $this->msg=count($this->arrayDestinatary);
			  $this->getNewsletterBody();
			  $this->getContentHandler();
			  $this->newsLetterSubject=stripslashes(trim(utf8_decode($this->Data->Title)));
			  $this->newsLetterBody;
			  foreach($this->arrayDestinatary as $d){
			  
			   
			  }
			  
			  
		}
		
    }
	
	
	// assembla  il testo  dell'email
	function getNewsletterBody(){
		
		if(NEWSLETTER_HEADER){$this->newsLetterBody.=NEWSLETTER_HTML_HEADER;}
		$this->newsLetterBody.=$this->Data->Descrizione;
		if(NEWSLETTER_FOOTER){$this->newsLetterBody.=NEWSLETTER_HTML_FOOTER;}
		$this->newsLetterBody=stripslashes(trim($this->newsLetterBody));
	}
	
	
	function getContentHandler(){
		
		//$this->newsLetterBody = str_replace("[_UNSUBSCRIBE_PAGE_]", NEWSLETTER_UNSUBSCRIBE_PAGE, $this->newsLetterBody);
		$this->newsLetterBody = str_replace("DIR_WS_SITE", DIR_WS_SITE, $this->newsLetterBody);
   }

	
	function notify_users($id_message)

	{
		if (!isset($id_message))
			return null;
		
        $this->curMessage=$id_message; //setto id  messaggio corrente	
		$msg_template_txt = implode("", file(EMAIL_TEMPLATE_TXT));
		$msg_template_html = implode("", file(EMAIL_TEMPLATE_HTML));
		
		
		
		// parte di select
			$this->tab = "{$this->tablename} AS {$this->suffix} LEFT JOIN 
						  usersmessages AS umsg ON {$this->suffix}.Id = umsg.messagesIdRow LEFT JOIN
						  user AS u ON u.IdUser = umsg.usersIdRow INNER JOIN
						  user AS uOwner ON uOwner.IdUser = {$this->suffix}.CreatedBy";
			$this->sel = "{$this->suffix}.lastModified, {$this->suffix}.Title, {$this->suffix}.Descrizione, {$this->suffix}.CreatedBy,
						  u.IdUser, u.FirstName, u.Surname, u.Email,u.Email2,u.FlagHtml,
						  uOwner.FirstName AS nomeOwner, uOwner.Surname AS cognomeOwner" ;
			$this->initWhere("{$this->suffix}.Id = {$id_message}");
		
			$dati = $this->getData();
			
			if (count($dati))
			{
				$this->testoMessaggio=$this->messageContentHandler($dati[0]);//passo solo la  proma  riga
                $this->titleMessaggio=$this->messageTitleHandler($dati[0]->Title);
                
                for ($i = 0; $i <count($dati); $i++)
				{
					
					//controlla la preferenza dell'email
						if ($dati[$i]->FlagHtml == 0)
						{
							$corpo_email = $msg_template_txt;
							$intestazione = "From: " . CMS_EMAIL_WEBMASTER . "\r\n";
							$intestazione .= "Reply-To: do_not_reply@{$_SERVER['SERVER_NAME']}\r\n";
						}
						else
						{
							$corpo_email = $msg_template_html;
							$intestazione =  "Content-Type: text/html; charset=\"iso-8859-1\"\n".
									     "From: " . CMS_EMAIL_WEBMASTER . "\r\n" .
    								     'Reply-To: do_not_reply@'.$_SERVER['SERVER_NAME']."\r\n" .
    								     'X-Mailer: PHP/' . phpversion();		}
					   
					//esegue i replace sull'email
						$corpo_email = str_replace("[_RECEIVER_]", "{$dati[$i]->FirstName} {$dati[$i]->Surname}", $corpo_email);
						$corpo_email = str_replace("[_SENDER_]", "{$dati[$i]->nomeOwner} {$dati[$i]->cognomeOwner}", $corpo_email);
						$corpo_email = str_replace("[_DATA_]", $dati[$i]->lastModified, $corpo_email);
						$corpo_email = str_replace("[_TITOLO_]",$this->titleMessaggio, $corpo_email);
						$corpo_email = str_replace("[_MESSAGE_]",$this->testoMessaggio, $corpo_email);
						
					// invia l'email
					if (!mail($dati[$i]->Email, CL_TITOLO_EMAIL, $corpo_email, $intestazione))
						echo ("errore durante l'invio dell'email {$dati[$i]->Email}");
					if($dati[$i]->Email2){
					   if (!mail($dati[$i]->Email2, CL_TITOLO_EMAIL, $corpo_email, $intestazione))
					   echo ("errore durante l'invio dell'email {$dati[$i]->Email2}");
                        
                    }

				}
			}
	}
  
	
// ****************************************************************************
} // end class
// ****************************************************************************
