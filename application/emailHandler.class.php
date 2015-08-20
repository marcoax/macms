<?php

class emailHandler extends commonQuery
{
    // ****************************************************************************
    //class constructor
    // ****************************************************************************
    function emailHandler()  {
        $this->initMailer();
     
    } // template
    // ****************************************************************************
    
  //init  the  class  to send  e-mail
   function initMailer(){
   	 
     $this->mailerObj = new PHPMailer();
	 if(ma_hasParameter('langSite'))$this->mailerObj->SetLanguage(ma_getParameter('langSite'),DIR_FS_CLASSLIB.'mailer/language/');
	 $this->mailerObj->FromName=CMS_EMAIL_FROMNAME;
	 $this->mailerObj->From = CMS_EMAIL_FROM;
	 $this->mailerObj->Subject=CL_TITOLO_EMAIL;
     $this->mailerObj->isHTML(true);
   }
   
   function setSubject($subject){
     $this->mailerObj->Subject=$subject;
    }
   
   
   function sendMsg($email,$name=''){
       $this->mailerObj->AddAddress($email,stripslashes($name));
	   $this->mailerObj->Body;
	   if(!$this->mailerObj->Send()) {
              $this->erroMsg ="<br>".MSG_ERROR_EMAIL_NOT_SENT;
              $this->erroMsg .= "<br>" . $this->mailerObj->ErrorInfo;
              return $this->erroMsg .= "";
	   }
       else {
             $this->mailerObj->ClearAddresses();
             $this->mailerObj->ClearAttachments();
      }
  }
  
  function prepareEmail($dati){
        if ($dati->FlagHtml == 1 ||  $this->isHTML==1){
		  $this->mailerObj->Body = $this->msg_template_html;
		}
		else {
		   $this->mailerObj->Body= $this->msg_template_txt;
		}
		//esegue i replace sull'email
		if(EMAIL_HEADER)$this->mailerObj->Body = str_replace("[_HEADER_]", EMAIL_HEADER,   $this->mailerObj->Body);
		if(EMAIL_FOOTER)$this->mailerObj->Body = str_replace("[_FOOTER_]", EMAIL_FOOTER,   $this->mailerObj->Body);
		$this->mailerObj->Body = str_replace("[_RECEIVER_]", "{$dati->Firstname} {$dati->Surname}",   $this->mailerObj->Body);
		$this->mailerObj->Body = str_replace("[_USERNAME_]", "{$dati->Username}",$this->mailerObj->Body);
		$this->mailerObj->Body = str_replace("[_PWD_]", "{$dati->Pwd}", $this->mailerObj->Body);
		$this->mailerObj->Body = str_replace("[_STRINGA_]", "{$dati->Stringa}", $this->mailerObj->Body);
		//$this->mailerObj->Body = str_replace("[_DATA_]", $dati->lastModified, $this->mailerObj->Body);
		$this->mailerObj->Body = str_replace("[_URLSTRINGA_]", $dati->UrlStringa, $this->mailerObj->Body);
		$this->mailerObj->Body = str_replace("[_MESSAGE_]", $dati->Descrizione, $this->mailerObj->Body);
		$this->mailerObj->Body = str_replace("[_NEWSLETTER_ACTIVATION_PAGE_]", $dati->Attivazione, $this->mailerObj->Body);
   }
   
   function setTemplate($actionType){
   
     
   //controlla la preferenza dell'email
	 switch($actionType){
		case "sendPwd":
          	$this->msg_template_txt = implode("", file(EMAIL_SENDPWD_TXT));
		    $this->msg_template_html = implode("", file(EMAIL_SENDPWD_HTML));
		break;
		case "notifyUpdate": 
		    $this->msg_template_txt = implode("", file(EMAIL_NOTIFY_TXT));
		    $this->msg_template_html = implode("", file(EMAIL_NOTIFY_HTML));
		break;
		case "notifySegnalazione": 
		    $this->msg_template_txt = implode("", file(EMAIL_SEGNALA_TXT));
		    $this->msg_template_html = implode("", file(EMAIL_SEGNALA_HTML));
		break;
		case "cake":
			
		break;  
	 }
	   
	   
   }

// ****************************************************************************
} // end class
// ****************************************************************************

?>