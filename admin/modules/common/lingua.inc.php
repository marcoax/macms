<?php
require_once (DIR_FS_CLASSES."Lingue.class.php");
require_once (DIR_FS_CLASSES."voci.class.php");
$lingueObj= new HTMLLingue();
if($mode!='edit')$lingueObj->setWhere('FlagOb',0);
$lingueObj->getQuery();
?>
<tr>
  <td colspan=2>
   <div id="sub_2">
   <table width="700px" border="1" cellspacing="0" cellpadding="0" bordercolor="#acacac"  class="tableForma">
    <?php echo $lingueObj->createHTML($linguaTab,$Id) ?>
   </table>
   </div>
  <td> 
</tr>