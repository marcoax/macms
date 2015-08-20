<?php
	session_start();
	session_start();
    $isRemote=1;
   // Configurazione generale
  include_once('config/configure.php');
  require_once(DIR_FS_VENDOR_CLASSES.'html2pdf/html2pdf.class.php');

    // get the HTML
    
     ob_start();
     include(DIR_FS_TEMPLATES.'print.php');
     $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
         //$html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple00.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }


