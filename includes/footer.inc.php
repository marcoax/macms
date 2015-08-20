<footer class="mt0 pt0">
	<!-- /foot-newsletter -->
	<?php //include(DIR_FS_BLOCKS."widgets_footer_newsletter.inc.php")?> 
    <!--=== Copyright ===-->
    <div class="copyright pt10">
    	
             
        <div class="container">
            <div class="row">
           
                <div class="col-xs-12 color-2 x-small">
                	 <p class="hidden-xs"> 
                    	<b>© <?php echo  date('Y')?> <?php echo  WEBSITE_TITLE?></b> / <?php echo WEBSITE_PIVA?>  / <i class="fa fa-phone"></i> <?php echo  WEBSITE_PHONE?>  / <i class="fa fa-envelope"></i> 
                    	 <?php echo  ma_html_builder::ma_helper_mailto()?> / <a href="<?php echo  articoli::ma_getPermalink('privacy')?>">Privacy Policy</a>
                      
                       
                         <?php if(strlen(WEBSITE_CREDITS)>15):?>/<a href="<?php echo WEBSITE_CREDITS?>" target="whomade">Credits</a><?php endif?>
                    </p>
                    <div class="scentered-list visible-xs">
		               <ul class="list-unstyled  margin-bottom-10 footer-link">
        					<li><i class="fa fa-envelope"></i> <?php echo  ma_html_builder::ma_helper_mailto(WEBSITE_EMAIL,'color-3')?></li>
        					<li><a href="tel:<?php echo  WEBSITE_PHONE?>"> <i class="fa fa-phone"></i>  <?php echo  WEBSITE_PHONE?></a></li>
        					<li> © <?php echo  date('Y')?> <?php echo  WEBSITE_ADDRESS?> <br> <?php echo WEBSITE_PIVA?></li>
       
						</ul>
                    </div>
                </div>
            </div>
        </div> 
    </div><!--/copyright--> 
    <!--=== End Copyright ===-->
</footer>
</div>
<?php include(DIR_FS_BLOCKS."widgets_cookie_eu.inc.php")?> 
  
<!-- Le javascript ================================================== -->
<script type="text/javascript">
	var serverPath		="<?php echo  DIR_WS_CATALOG?>";
	var urlAjaxHandler 	= serverPath + 'view/ajax/index.php';;//percorso  del contenuto del  dialog
	var website_name	="<?php echo  WEBSITE_NAME?>";
	var isNewsletterActived="<?php echo  $isNewsletterActived?>";
	var mySezione		="<?php echo  $mySezione?>";
	var serverPathImgSezione=serverPath+'/images/'+mySezione;
	<?php if($curPage=='news'):?>
		var imageScroll="up_news.png";  
	<?php else:?>
		var imageScroll="<?php echo  DIR_WS_IMAGES?>up.png";   
	<?php endif?>
	
</script>
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src=""<?php echo DIR_WS_JS?>jquery.js"><\/script>')</script>
<script src="<?php echo  DIR_WS_PLUGIN?>jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo DIR_WS_LANG?>localize.<?php echo $lang?>.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo  DIR_WS_PLUGIN?>back-to-top.js"></script>
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo  DIR_WS_PLUGIN?>bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_PLUGIN?>carousel-swipe.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo  DIR_WS_JS?>app.js"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_JS?>notify.min.js"></script>
<script type="text/javascript" src="<?=DIR_WS_JS?>lib/jquery.maCookieEu.js"></script>
<script type="text/javascript" src="<?php echo  DIR_WS_PLUGIN?>/wow-animations/js/wow.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
		$.maCookieEu(this,{
    			position    	: "bottom",
				cookie_name 	: "<?php echo $cookie_name ?>",
				background		: "#838584",
				delete_cookie 	: false,
			}
		);
		
    });
</script>

<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
<![endif]-->
<?php
	if(file_exists(DIR_FS_INCLUDES.$objPage->Template."_header_js.inc.php")){
   	require_once(DIR_FS_INCLUDES."/".$objPage->Template."_header_js.inc.php");
}?>
<?php
	if(file_exists(DIR_FS_INCLUDES.$curPage."_header_js.inc.php")){
   	require_once(DIR_FS_INCLUDES."/".$curPage."_header_js.inc.php");
}?>
	
<?php include(DIR_FS_BLOCKS."widgets_google_stat.inc.php")?>
