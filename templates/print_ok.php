<?php
	session_start();
	$isRemote=1;
    // Configurazione generale
    include_once('../config/configure.php');
	require_once(DIR_FS_INCLUDES.'common_include.inc.php');
	$objPageData = new articoli();
	$objPageData->getPageData($_GET['page']);
	$objPage=$objPageData->getData(2);
	$objPage = articoli::lang_text_helper($objPage->Dominio,$objPage,$lang);
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title>Header and Footer example</title>
<style type="text/css">

@page {
	margin: 0.5cm;
}

body {
    font-family: sans-serif;
	margin:4.5cm 0.5cm;
	text-align: justify;
	font-size: 12px;
	
}
a {
  
  color: #A81729;
  
}
#header,
#footer {
  position: fixed;
  left: 0;
  right: 0;
  color: #A38878;
  font-size: 0.9em;
}

#header {
  top: 0;
  border-bottom: 0.0pt solid #aaa;
  font-size:1em;
  font-weight:bold;
	
}

#footer {
  bottom: 15pt;
  margin-top:10pt;
  border-top: 0pt solid #aaa;
}

#header table,
#footer table {
	width: 100%;
	border-collapse: collapse;
	border: none;
}

#header td,
#footer td {
  padding: 10px;
	width: 100%;
}

.page-number {
  text-align: center;
}

.page-number:before {
  content: "Page " counter(page);
}

hr {
  page-break-after: always;
  border: 0;
}
.table-responsive table {
  border:1px solid;
  border-collapse: collapse !important;
}
.table-responsive   td{
   border:1px solid;
   text-align: center;
   padding:3px;
}
p{
  margin:0px;
  padding:0px 0px 5px 0px;
}
h1{
  margin:0px;
  padding:0px 0px 15px 0px;
}
</style>
 

</head>

<body>
<div id="header" >
 	<table>
		<tr style="background: #DADADA;padding:10px;text-align: center">
			<td style="padding:10px" valign="top">  <span><?php echo CL_FOR_INFO?>:</span> <span style="color:#A81729">&nbsp;<img  src="<?php echo DIR_WS_IMAGES?>/tel.png" style="margin:0px 3px 0px 6px;"><?php echo  WEBSITE_PHONE?>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo DIR_WS_IMAGES?>/mail.png" style="margin:0px">&nbsp;info@lamodernacartotecnica.it</span></td>
    	</tr>
		<tr style="text-align: center;">
			<td style="padding:18px"><img class="" id="logo-header" src="<?php echo DIR_WS_IMAGES?>/logo-printA4.png" alt="La Moderna Cartotecnica srl - Panettone"></td>
		</tr>
	</table>
</div>

<div id="footer">
  © <?php echo  date('Y')?> <?php echo  WEBSITE_TITLE?></b> -  <?php echo WEBSITE_PIVA?>
</div>
<div  style="padding:15px;background: #DADADA">
	<table>
		<tr >
			<td style="width:50%" valign="top">
				<h1 style="color:#A81729"><?php echo stripslashes( $objPage->Name )?></h1>
				<?php echo  stripslashes($objPage->Descrizione )?>	
			</td>
    		<td style="padding:10px;width:50%" valign="top">
    			<img style="width:340px" src="<?php echo  ma_get_image_from_repsitory($objPage->Img)?>" alt="<?php echo stripslashes( $objPage->Name )?>" border="0">
			</td>
		</tr>
	</table>
</div>
<div id="table-box" class="table-responsive" style="margin-top:40px;margin-bottom:10px">
<?php echo stripslashes( $objPage->Abstract )?>	
</div>

<?php echo stripslashes( $objPage->Intro )?>
</body>
</html>
