<?php
    $descrizioneObj= new HTMLLingue();
    if($mode!='edit')$descrizioneObj->setWhere('Disable',0);
    if($descrizioneTipo=='input')$descrizioneObj->setFieldType($descrizioneTipo);
    if($descrizioneTextAreaSize)$descrizioneObj->TetxAreaSize=$descrizioneTextAreaSize;
    $descrizioneObj->getQuery();
?>

   <div id="sub_<?php echo  $descrizioneDivId?>">
   <table class="tableForma">
 
    <?php echo  $descrizioneObj->createNote($msgDescrizione)?>
    <?php echo  $descrizioneObj->createHTML($descrizioneTab,$Id,'Descrizione',$descrizioneStart,$descrizione_IdPage) ?>
   </table>
   </div>
