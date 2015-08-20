<?php
define('MSG_ITEM_PER_PAGE', 'Elementi per pagina');
define('MSG_HELP_ADD', 'Add Elemento');
define('MSG_HELP_ADD_USER', 'Aggiungi Utente');
define('MSG_HELP_ANNULLA', 'Annulla');
define('MSG_HELP_ADDITEM', 'Aggiungi Nuovo elemento');
define('MSG_HELP_ADD_PAGE', 'Aggiungi Nuova pagina');
define('MSG_HELP_ADDNUOVO','Aggiungi una voce');
define('MSG_HELP_ADDSCADACALC','Aggiungi scadenza al calcolo automatico');
define('MSG_HELP_SCADENZA','Scadenza');
define('MSG_HELP_ADD_DONATORE','Aggiungi Donatore');
define('MSG_HELP_EDIT', 'Modifica');
define('MSG_HELP_CANCEL', 'Cancella');
define('MSG_HELP_COPY', 'Duplica');
define('MSG_HELP_DATASAVED', 'Dati salvati correttamente.');
define('MSG_HELP_REINDIRIZZAMENTO', 'Reindirizzamento allo scadenziario');define('MSG_HELP_TAG','elenco di voci separate da virgola (ad esempio: documento,lsk, problema meccanico..)');
define('MSG_HELP_CLEAR', 'Pulisci');define('MSG_HELP_CLOSE', 'Close');define('MSG_HELP_CREA_ACCOUNT', 'Crea account');define('MSG_HELP_DELETE', 'Elimina');define('MSG_HELP_DELETED', 'L\'oggetto &egrave; stato cancellato');define('MSG_HELP_DELETE_SELECTED_ITEM', 'Cancella i record selezionati');define('MSG_HELP_FIND_GMAPS_POINT','Google Maps Find point');define('MSG_HELP_MODIFY', 'Modifica');define('MSG_HELP_OR','oppure');define('MSG_HELP_SAVE', 'Salva');
define('MSG_HELP_PREVIEW_PAGE', 'Visualizza pagina');define('MSG_HELP_SAVE_OK', 'I dati sono stati salvati con successo');define('MSG_HELP_RESET', 'Reset');define('MSG_HELP_REQUIRED','Campi obbligatori');define('MSG_HELP_REGISTER','Registrati');define('MSG_HELP_INSERISCI_EMAIL', 'Inserisci email');define('MSG_HELP_VIEW', 'Vedi');
define('MSG_HELP_WARNING_SUBFOLDER','You\'ll be able to add users to this folder once you\'ve saved it');
define('MSG_HELP_WARNING_TODOLIST','You\'ll be able to add users to this list once you\'ve saved it');define('MSG_HELP_WARNING','Attenzione!!!');define('MSG_HELP_UPLOAD','Importa  file');define('MSG_NOITEM', 'Nessun record trovato');define('MSG_NO_USER', 'Nessun utente trovato');define('MSG_NO_DOC', 'Nessun Documento trovato');define('MSG_SELECT', 'Prego selezionare');define('MSG_TORNA_LISTA', 'Torna alla lista');define('MSG_TORNA_ELENCO',' Torna all\'Elenco');define('MSG_TORNA_AL_CALENDARIO', 'Torna al calendario');define('MSG_TORNA_AL_DOCUMENTO', 'Torna al documento');define('MSG_TORNA_A_AZIONE', 'Torna all\' azione');


/*****************************************************  calcola   scadedenza   box *******************************/
define('CL_CALCOLA_SCADENZA','Calcola scadenza');
define('CL_DAYS','Giorni');
define('CL_MONTHS','Mesi');
define('CL_DATASTART','01-08-');
define('CL_DATAEND','15-09-');
define('CL_DAL','Dal');
define('CL_AL','Al');
define('CL_CALCOLA_SCADENZA_SOSP','Sospensione feriale');
define('CL_CALCOLA_SCADENZA_SOSP_APP','Applica');
define('CL_CALCOLA_SCADENZA_SOSP_NAPP','Non applicare');
define('CL_CALCOLA_SCADENZA_REMOVE','Rimuovi scadenza');
define('CL_CALCOLA_SCADENZA_CAL','Calcolo');
define('CL_CALCOLA_SCADENZA_DOPO','Dopo');
define('CL_CALCOLA_SCADENZA_PRIMA','Prima');
define('CL_CALCOLA_SCADENZA','');
define('CL_SCADENZE_DA_CALC','Scadenze da calcolare');
define('MSG_NO_REMINDER','Nessun reminder impostato');
define('MSG_EMAIL_REMINDER_TXT','elenco  di indirizzi  email  separati da ;');
 
 
 
/***********************************************form  validation and  feedback******************/
define("MSG_FORM_ENTER_YOUR_USERNAME","Inserisci il tuo Username");
define("MSG_FORM_ENTER_YOUR_PWD","Inserisci la tua  password");
define('MSG_ERROR_LOGIN', 'Email o  password  errate <br>prego  riporvare');

define('MSG_THANK_SUBSCRIBE_NOTIFY','Grazie  per  aver inviato la tua  richiesta');

// Label recupero password
define('RECOVER_PASSWORD_FORGET', 'Dimenticato la password?');
DEFINE('RECOVER_PASSWORD_TEXT','Prego inserire l\'email utilizzato in fase  di registrazione.');
DEFINE('RECOVER_PASSWORD_RECOVER','Inviami  la mia password');
DEFINE('RECOVER_PASSWORD_RECOVER_EMAIL','Inserisci il tuo email');
DEFINE('RECOVER_PASSWORD_BACK','Back');
DEFINE('RECOVER_PASSWORD_NOACCOUNT','Sorry, specified email address not found or disabled');
DEFINE('RECOVER_PASSWORD_MAIL_FROM',STORE_NAME.' <'.STORE_EMAIL.'>');
DEFINE('RECOVER_PASSWORD_MAIL_SUBJ',STORE_NAME.' password recovery');
DEFINE('RECOVER_PASSWORD_MAIL_SEND_OK','Your password has been  sent correctly   to  your  email  address');
DEFINE('RECOVER_PASSWORD_MAIL_SEND_ERROR','Error during message sending');

/// registrazione dati  utente e attiivazione  utente 
define('MSG_HELP_EMAIL_NON_PRESENTE','Email non presente nel nostro database');define('MSG_REGISTRATI_PER','Registrati ed effettua il login per iniziare ad usare il servizio');define('MSG_HELP_PWD_INVIATA', 'La nuova password  &eacute; stata inviata al tuo indirizzo email');define('MSG_ERRORE_NOME','Inserire Nome e Cognome');define('MSG_ERRORE_PWD','Inserire un una password di almeno 8 caratteri alfanumerici');define('MSG_USER_ACCOUNT_ACTIVED','Complimenti il tuo account  gi&agrave; stato attivato.Ora puo effettuare il login.');define('MSG_USER_ALREADY_ACTIVED','Utente già attivo');

/************************creazione  pdf ***********************/
define('MSG_CONFIGURA_PDF','Configura Pdf');define('MSG_ANTEPRIMA_PDF','Visualizza Pdf');define('MSG_EXCEL_EXCLUDE_COL','Excludi  questa   colonna');/*errori*/define('MSG_ERROR_EMAIL_NOT_SENT', 'Errore invio Email');define('MSG_ERRORE_EMAIL_FORMAT', 'Inserire un indirizzo email valido');define('MSG_ERROR_NOME_INVALID','Nome non valido');define('MSG_ERROR_EMAIL_PUT','Inserire E-mail');define('MSG_ERROR_EMAIL_PRESENT','E-mail gi&agrave; presente');define('MSG_ERRORE_EMAIL_NOT_FOUND','Email non presente ');define('MSG_ERROR_LOGIN_INVALID','Prego inserire username e password');define('MSG_ERROR_LOGIN_NON_ATTIVO','Utente non attivo oppure non hai i permessi per  accedere');define('MSG_ERROR_DATE_INALID_FORMAT', 'Data  o  formtato data non valida (YYYY-MM-DD)');
