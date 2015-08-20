<form id="form_getPwd" name="form_getPwd" method="POST" action="">
	<fieldset class="span5">
	  <p id="recuperomessage" class="alert alert-error hide"></p>
      <label id="recuperoLabel"><?php echo  strtoupper(RECOVER_PASSWORD_RECOVER); ?></label>
      <input type="text" name="email" id="recover-email" size="30" autocomplete="off" class="span5" placeholder="<?php echo RECOVER_PASSWORD_RECOVER_EMAIL ?>" rel="popover" data-content="<?php echo  RECOVER_PASSWORD_TEXT?>" data-original-title="<?php echo  RECOVER_PASSWORD_RECOVER_EMAIL?>"/>
      <a class="btn pull-right btn-primary" href="#" onclick="recoverPWD();return  false" ><i class="icon-envelope icon-white"></i> <?php echo  RECOVER_PASSWORD_RECOVER; ?></a>
    </fieldset>
</form>
