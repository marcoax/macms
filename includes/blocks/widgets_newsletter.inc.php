<!-- /social -->     
<div class="row">
	<div class="col-xs-12">
		<form id="newsletter" class="sform-inline" >
				<h2 >/ <?php echo  CL_NEWSLETTER?></h2>
				<h3 class="subtitle viola"><?php echo  CL_NEWSLETTER_ISCRIZIONE?></h3>
				<input class="col-xs-12" id="email" type="text" placeholder="<?php echo  MSG_INSERISCI_EMAIL?>" style="padding:10px;">
				<button class="btn btn-primary" type="button" style="padding:10px;"  onclick="iscivitiNewsletter();return false"><?php echo  CL_NEWSLETTER_ISCRIZIONE?></button>
		</form>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo  WEBSITE_TITLE?></h4>
			</div>
			<div class="modal-body" id="myModal-body">
				...
			</div>
		</div>
	</div>
</div>
