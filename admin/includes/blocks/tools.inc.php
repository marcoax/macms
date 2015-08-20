<?php
      //$saveJs="sendData()"   $itemObj= new combo;   $itemObj->setInv();   $itemObj->setMode(4);   $w_itemObj=$itemObj->makeSimpleCombo('10,20,30,40,50,100',$limit,'stringa');      $lastObjC= new combo;   $lastObjC->setInv();   $lastObjC->setMode(4);   $w_lastObjC=$lastObjC->makeSimpleCombo('Today#1,Last 7 Days#7,Last 30 Days#30,Last 90 Days#90,Last 180 Days#180,Last Years#365',$lastObj,'stringa');   
?>

<div class="btn-toolbar" style="margin-bottom: 9px">
	<?php if($isModal==1 && ma_get_page()=='modalEdit'):?>
		<a title="Close window" data-dismiss="modal"  class="btn btn-danger" > <?php echo boostrapHtml::createFaButton('fa-remove')?> <?php echo MSG_HELP_CLOSE?></a>
	<?php endif?>
	<?php if($saveButt==1 || ma_get_page()!='edit'):?>		<a  href="#" class="btn btn-primary" onclick="<?php echo $saveJs?>"> <?php echo boostrapHtml::createFaButton('fa-save')?>  <?php echo  MSG_HELP_SAVE?> </a>	<?php endif?>		<?php if($copyButton==1 && ma_get_page()=='edit' &&  $mode=='edit'):?>		<a href="#"  class="btn btn-primary" onclick="<?php echo $urlCopy?>;return false"> <?php echo boostrapHtml::createFaButton('fa-copy')?>  <?php echo MSG_HELP_COPY?></a>
	<?php endif?> 
</div>