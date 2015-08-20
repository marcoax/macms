<?php

 include(DIR_FS_CMS_MODULES."common/reminder_userListHandler.inc.php");

/* $arra=explode(';',trim($objSez->Data->addEmail));

foreach($arra as $a){
	if(filter_var(trim($a), FILTER_VALIDATE_EMAIL))echo trim($a).'<br>'; 
}
*/
?>
<div id="reminderBox">
<h4 class="separatoreTop"><?php echo  CL_NOTIFICA_SCADENZA?></h4>
<?php echo  MSG_EMAIL_REMINDER_TXT?>
<textarea rows="5" id="<?php echo  $mainTab?>_addEmail" name="<?php echo  $mainTab?>.addEmail"><?php  echo $objSez->Data->addEmail?></textarea>
<?php if($saveButt==1 || ma_get_page()!='edit'):?>
         <a  href="#" class="btn btn-primary" onclick="validazione();return false"> <i class="icon-save"></i> <?php echo  MSG_HELP_SAVE?> </a>
    <?php endif?>
</div>
