<?php
   
?>

<div class="btn-toolbar" style="margin-bottom: 9px">
	<?php if($isModal==1 && ma_get_page()=='modalEdit'):?>
		<a title="Close window" data-dismiss="modal"  class="btn btn-danger" > <?php echo boostrapHtml::createFaButton('fa-remove')?> <?php echo MSG_HELP_CLOSE?></a>
	<?php endif?>
	<?php if($saveButt==1 || ma_get_page()!='edit'):?>
	<?php endif?> 
</div>