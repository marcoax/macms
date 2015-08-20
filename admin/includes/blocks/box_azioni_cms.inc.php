<div class="boxContainer"><h3><?php echo   CL_AZIONI?></h3>  
	<ul class="nav nav-list">
		<li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=<?php echo $Id_sez?>&Id_sub=<?php echo $Id_sub?>&mode=up" class="nero"> <?php echo boostrapHtml::createFaButton('fa-plus')?> <?php echo MSG_HELP_ADDNUOVO?></a></li>	
		<li><a href="<?php echo FILENAME_LISTA.".php?Id_sez=".$Id_sez."&Id_sub=".$Id_sub;?>" class="nero"> <?php echo boostrapHtml::createFaButton('fa-list')?> <?php echo MSG_TORNA_ELENCO?></a></li> 
	    <?php if($previewButt==1 && ma_get_page()=='edit' &&  $mode=='edit'):?>
        <li><a href="<?php echo Tool::cmsPreviewHandler($objSez->Data)?>" class="nero" target="_new"> <?php echo boostrapHtml::createFaButton('fa-eye')?> <?php echo MSG_HELP_PREVIEW_PAGE?></a></li> 
  		<?php endif?>
	</ul>
</div>