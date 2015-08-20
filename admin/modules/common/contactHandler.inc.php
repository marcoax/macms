<?

/* 
	Richiede che gli vengano passati:
		- Destinatari...  $_POST['messaggi.Destinatari']
		- Id del messaggio.... $_POST['messaggi.Id']
		- Flag (id che rappresenta (draft, non draft))......  $_POST['messaggi.IdStato']
	
	Controlla dentro usersmessages ed elimina tutti i record il cui messagesIdRow = $_POST['messaggi_Id'];
	(serve per quando si fa la modifica di un messaggio).
	Salva tutti i destinatari dentro usersmessages
*/
require_once(DIR_FS_CLASSES . "messaggi.class.php");
$objMsg = new messaggi();


if ($_POST['messaggi_Destinatari'] != "")
{
	// recupera l'id messaggio se non è stato passato come parametro
	if ( (!isset($_POST['messaggi_Id'])) || ($_POST['messaggi_Id'] == '') )
	{	
		$return = mysql_query("SELECT MAX(Id) FROM messaggi");
		$dati_msg = mysql_fetch_assoc($return);
		$id_messaggio = $dati_msg['MAX(Id)'];
	}
	else
		$id_messaggio = $_POST['messaggi_Id'];
		
	// cancello tutti i record dentro usersmessages
		$return = mysql_query("DELETE FROM usersmessages
						   	   WHERE messagesIdRow = {$id_messaggio}");
	
	$array_destinatari = explode(",", $_POST['messaggi_Destinatari']);
	
	for ($i = 0; $i < count($array_destinatari); $i++)
	{
		/* 
			recupera l'email preoccupandosi prima di eliminare gli spazi vuoti iniziali e finali di ogni stringa.
			da stostituire con le chiamate a query del cms
		*/
		
		$array_destinatari[$i] = trim(strrchr($array_destinatari[$i], " "));

		if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $array_destinatari[$i]))
		{
				$return = mysql_query("SELECT IdUser, Email
			  			   			   FROM user
			  			   			   WHERE Email = '{$array_destinatari[$i]}'");
				$dati_utente = mysql_fetch_assoc($return);

				// scrive i destinatari
					$return = mysql_query("INSERT INTO usersmessages (messagesStatus, messagesIdRow, usersIdRow)
										   VALUES ('0',  '{$id_messaggio}',  '{$dati_utente['IdUser']}');");
		}
	}
	
	// Stampa messaggio di risultato
		
	
	// se il flag mi dice che lo stato del messaggio è 'pubblicato', invio la comunicazione a tutti i destinatari
		if ($_POST['messaggi_IdStato'] == '22')
		{
			$objMsg->notify_users($id_messaggio);
			
			echo("<h1><b>Messaggio Inviato con successo ai seguenti destinatari:</b></h1><br>");
			echo ("<p><ul>");
			
			$array_destinatari = explode(",", $_POST['messaggi_Destinatari']);
			for ($i = 0; $i < count($array_destinatari); $i++)
			{
				if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", trim(strrchr($array_destinatari[$i], " "))))
					echo ("<li style=\"color:red;\">{$array_destinatari[$i]}</li>");
				else
					echo ("<li style=\"color:red;\">*** Formato email non valido: {$array_destinatari[$i]}. Impossibile Inviare il messaggio !</li>");
			}
			
			echo ("</ul></p>");
		}
		else
			echo ("<h1><b>Messaggio Salvato</b></h1><br>");
		
	
	echo ("<br><br><br><br>");
	
}

?>


