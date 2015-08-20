<?php 
$cookie_name    = APP_SUX.'_eu';

$cookie_message = array(
		'en' => array(
				   'string' =>'This site uses cookies. By continuing to browse the site you are agreeing to our use of cookies',
				   'info'  => 'Find out more here',
		
		),
		'it' => array(
				   'string' =>'I cookie ci aiutano a fornire i nostri servizi. Utilizzando tali servizi, accetti l\'utilizzo dei cookie da parte nostra.',
				   'info'  => 'Maggiori informazioni qui',
		),
);

if (!$_COOKIE[$cookie_name]==1) :?>
	<div class="cookie_notice" role="status">
		<span><?php echo $cookie_message[$lang]['string']?>.&nbsp;
			<a title="Leggi la nostra Informativa sulla privacy" href="/privacy.php?lang=<?php echo $lang?>"><?php echo $cookie_message[$lang]['info']?></a>
		</span>
		<span class="closer" id="cookie_close"><i class="fa fa-times"></i></span>
	</div> 
<?php endif?>

