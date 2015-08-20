<?php
$etichettaObj= new HTMLLingue();
if($mode!='edit')$etichettaObj->setWhere('Disable',0);
if($etichettaTipo=='input')$etichettaObj->setFieldType($etichettaTipo);
$etichettaObj->getQuery();
?>
<tr>
  <td colspan=2>
   <div id="sub_<?php echo $etichettaDivId?>">
   <table width="700px" border="1" cellspacing="0" cellpadding="0" bordercolor="#acacac"  class="tableForma">
    <?php echo $etichettaObj->createHTML($etichettaTab,$Id,'etichetta',$etichettaStart) ?>
   </table>
   </div>
  <td>
</tr>