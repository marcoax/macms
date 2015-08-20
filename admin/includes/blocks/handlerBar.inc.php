<div  id="list-action-bar" class="pull-left" style="display:none">		 <div class="btn-group btn-bread">		<button class="btn btn-default" onclick="actionHandler('deleteAll');return false" rel="tooltip" data-placement="bottom" data-original-title="<?php echo  MSG_HELP_DELETE?>">
		<?php echo boostrapHtml::createFaButton('fa-trash  color-main')?> 
		</button>		<button id="editButtonHandler" class="btn btn-default" onclick="actionHandlerEdit('editItem');return false" rel="tooltip" data-placement="bottom" data-original-title="<?php echo  MSG_HELP_MODIFY?>">
		<?php echo boostrapHtml::createFaButton('fa-edit  color-main')?>
		</button>
		<?php if($archiveButt==1):?>		<button class="btn btn-default" onclick="actionHandler('archiviaAll');return false">
		<?php echo boostrapHtml::createFaButton('fa-download  color-main')?> <?php echo  CL_ARCHIVIA?>
		</button>		<!--<button class="btn" onclick="actionHandler('riattivaAll');return false"><i class="icon-undo"></i> <?php echo  CL_ATTIVA?></button>-->			<?php endif?>	</div></div>
