<?php
session_start();
$isRemote=1;
// Configurazione generale
session_start();
include('../../config/configure.php');
require_once(DIR_FS_INCLUDES.'common_include.inc.php');
if($_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Firstname']){
  $isRisposta=1;
   // faccio  insert  ned  database
	  $Surname=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Surname'];
	  $Firstname=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Firstname'];
	  $Address=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Address'];
	  $Zipcode=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Zipcode'];
	  $City=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_City'];
	  $State=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_State'];
	  $IdCountry=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_IdCountry'];
	  $Company=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Company'];
	  $Attivita=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Attivita'];
	  $IdTipo=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_IdTipo'];
      $Phone=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Phone'];
      $Fax=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Fax'];
      $Mobile=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Mobile'];
	  $Email=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Email'];
	  $Note=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_Note'];
	  $FlagNewsletter=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_FlagNewsletter'];
	  $FlagCatalogo=$_REQUEST[TABLE_ANAGRAFICARICHIESTE.'_FlagCatalogo'];
	  $dateCreation=date("Y-m-d");
	  
	  
 // costruisco  la  query
    $queryUser="INSERT
	              INTO ".TABLE_ANAGRAFICARICHIESTE."(
                      Firstname , Surname , Address , Zipcode , City ,
			          State , IdCountry ,Company,Attivita,IdTipo,
                      Email,Phone,Fax,Mobile,dateCreation,Stato,
					  Note,FlagNewsletter,FlagCatalogo
                  )
                  VALUES (
                     '".addslashes($Firstname)."', '".addslashes($Surname)."', '".addslashes($Address)."' , '".addslashes($Zipcode)."' ,
                       '".addslashes($City)."' ,'".$State."', '".$IdCountry."','".$Company."','".$Attivita."','".$IdTipo."',
                       '".addslashes($Email)."','".$Phone."','".$Fax."','".$Mobile."','".$dateCreation."',1,
					   '".addslashes($Note)."','".$FlagNewsletter."','".$FlagCatalogo."'
				 )";
      $db->execute($queryUser);
	  //invio  mail
	   $curPage='risposta';
	   include(DIR_FS_BLOCKS."email_richiesta_informazioni.inc.php");  
}
?>