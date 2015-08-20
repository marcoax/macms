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
<style type="text/css">
<!--

    table.page_header {
		width: 100%;
		border: none;
		padding: 0mm;
		font-size:1em;
		font-weight:bold;
		height: 200px;
		
	}
	table.page_footer {width: 100%;
		border: none;
		background-color: #FFFFFF;
		border-top: solid 0mm #AAAADD;
		padding: 2mm;
		color: #A38878;
	}
	
	table {
		
		border-collapse: collapse;
		width:100%;
	}
	table  td{
		border:1px solid;
		text-align: center;
		padding:1mm;
		margin:0mm;
		font-size: 8pt;
	}
	table.page_header {
		width: 100%;
		border: none;
		padding: 0mm;
		font-size:1em;
		font-weight:bold;
		
		
	}
	table.page_footer {
		width: 100%;
		border: none;
		background-color: #FFFFFF;
		border-top: solid 0mm #AAAADD;
		padding: 2mm;
		color: #A38878;
	}
	table.page_footer td, table.page_footer td{
		border:0px solid;
		text-align: center;
		padding:1mm;
	}
	p{
		margin:0px;
		padding:0px 0px 5px 0px;
	}
	h1{
		margin:2mm;
		padding:0px 0px 15px 0px;
	}
-->
</style>
<page backtop="40mm" backbottom="14mm" backleft="0mm" backright="0mm" style="font-size: 10pt">
    <page_header>
       <table class="page_header">
            <tr>
                <td style="text-align: center;width: 100%;background: #DADADA;padding:1mm;border:0px solid">
                	<span><?php echo CL_FOR_INFO?>:</span> <span style="color:#A81729">&nbsp;<img  src="<?php echo DIR_WS_IMAGES?>/tel.png" style="margin:0px 3px 0px 6px;"><?php echo  WEBSITE_PHONE?>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo DIR_WS_IMAGES?>/mail.png" style="margin:0px">&nbsp;info@lamodernacartotecnica.it</span>
                </td>
             </tr>
             <tr style="text-align: center;">
			    <td style="padding:18px;border:0px solid"><img class="" id="logo-header" src="<?php echo DIR_WS_IMAGES?>/logo-printA4.png" alt="La Moderna Cartotecnica srl - Panettone"></td>
		     </tr>
        </table>
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: left;border:0px solid">
                    © <?php echo  date('Y')?> <?php echo  WEBSITE_TITLE?> -  <?php echo WEBSITE_PIVA?>
                </td>
            </tr>
        </table>
    </page_footer>
    <div  style="padding:15px 0px 0px 15px;background: #DADADA;margin-bottom:7mm">
		<table style="width: 95%;">
			<tr >
				<td style="width: 50%; text-align: left; padding-right:20px;border:0px solid;font-size: 10pt;" valign="top">
					<h1 style="color:#A81729"><?php echo stripslashes( $objPage->Name )?></h1>
					<?php echo  stripslashes($objPage->Descrizione )?>	
				</td>
	    		<td style="width: 50%; text-align: left;border:0px solid" valign="top">
	    			<img style="width: 368px;" src="<?php echo  ma_get_image_from_repsitory($objPage->Img)?>" alt="<?php echo stripslashes( $objPage->Name )?>" border="0">
				</td>
			</tr>
		</table>
		<br>
	</div>
	
	<?php echo stripslashes( $objPage->Abstract )?>	
	<?php echo stripslashes( $objPage->Intro )?>
</page>

