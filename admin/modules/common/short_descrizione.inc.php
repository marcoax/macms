<?php
    $short_descrizioneObj= new HTMLLingue();
    if($mode!='edit')$short_descrizioneObj->setWhere('Disable',0);
    if($short_descrizioneTipo=='input')$short_descrizioneObj->setFieldType($short_descrizioneTipo);
    if($short_descrizioneTextAreaSize)$short_descrizioneObj->TetxAreaSize=$short_descrizioneTextAreaSize;
    $short_descrizioneObj->getQuery();
?>
<div id="sub_<?php echo  $short_descrizioneDivId?>">
   <table class="tableForma">
    <?php echo  $short_descrizioneObj->createNote($msgDescrizione)?>
    <?php echo  $short_descrizioneObj->createHTML($short_descrizioneTab,$Id,'Intro',$short_descrizioneStart,$short_IdPage) ?>
   </table>
</div>