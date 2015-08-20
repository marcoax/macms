<div id="foot-bar" class="<?php echo $curPage?> bg-color-blue hidden">
		<div class="container content-small">
			
				<div class="row">
					<div class=" col-sm-6 col-xs-12 col-md-6 col-sm-push-6" id="foot-dx-bottom">
						<form id="newsletter" class="form-inline">
							<div class="form-group">
								<label for="email" class="control-label grigio mid">/ newsletter </label>
								<div class="input-group btn-full" >
									<input type="text" class="form-control "	 id="email" name="email" type="text" placeholder="<?php echo CL_YOUR_EMAIL?>">
								</div>
							</div><button id="btn-newsletter-subscribe" class="btn btn-default btn-full" type="button"><?php echo CL_NEWSLETTER_ISCRIZIONE?></button>
							<div class="small text-right padding-top-5"><a href ="<?php echo  articoli::ma_getPermalink('privacy')?>">* Leggi l'informativa sulla privacy</a></div>
						</form>
						
					</div>
					<div class="col-sm-6 col-xs-12 col-md-6 col-sm-pull-6 grigio small" id="foot-sx-bottom">
						<div class="" id="socialBox"><?php $objSocialHtml->render()?></div>
					</div>
			</div>
		</div>
	</div>