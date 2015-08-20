<?php
if($FlagCatalogo==1) $sub=WEBSITE_SITE." - Nuova Richiesta Catalogo";
else $sub=WEBSITE_SITE." - Nuova Richiesta Informazioni";
  $body="E' stata inviata una nuova richiesta di informazioni\n";
  $body.="da:".$Firstname." ".$Surname."\n";
  
  /*$body.="Azienda:".$Company."\n";
  if($Attivita)$body.="Settore:".$Attivita."\n";
  $body.="Indirizzo:".$Address."\n";
  $body.="Cap:".$Zipcode."\n";
  $body.="Citta:".$City."\n";
  //$body.="Provincia:".$State."\n";
  if($Phone)$body.="Telefono:".$Phone."\n";
  if($Mobile)$body.="Cell:".$Mobile."\n";
  if($Fax)$body.="Fax:".$Fax."\n";
   * */
  
  $body.="Email:".$Email." \n";
  $body.="Note:".$Note." \n";
  mail (EMAIL_WEBMASTER, $sub, $body, "From: ".$Email."\nX-Mailer: My PHP Script\n"); 
  if($_SERVER['HTTP_HOST']!='localhost'){
      mail ( WEBSITE_EMAIL, $sub, $body, "From: ".$Email."\nX-Mailer: My PHP Script\n");
  } 
?>