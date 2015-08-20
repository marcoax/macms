 <!-- Navbar -->
  <div id="main-navi" class="navbar navbar-default navbar-fixed-top " role="navigation">
 	 <!-- Topbar -->
	   <?php if( $webApp->config->isMultiLang == true  )include(DIR_FS_INCLUDES."header_top.inc.php")?>
	   <!-- End Topbar -->
    <div id="main-nav-bar" class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars xx-big color-2 "></span>
            </button>
            <a class="navbar-brand pr25-min-md" href="<?php echo  DIR_WS_HOMEPAGE?>">
            	<img class="visible-xs visible-sm" id="logo-header" src="<?php echo  DIR_WS_IMAGES?>logo-small-mobile.png" alt="<?php echo   $objPage->pageTitle?>">
                <img class="hidden-xs hidden-sm" id="logo-header" src="<?php echo  DIR_WS_IMAGES?>logo-small.png" alt="<?php echo   $objPage->pageTitle?>">
            </a>
         </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
        
			<ul class="nav navbar-nav">
				<?php echo  $objHtmlMenu->render()?>
				<!-- Home -->
				<!-- Search Block -->
				<li class="hidden">
					<i class="search fa fa-search search-btn"></i>
					<div class="search-open">
						<div class="input-group animated fadeInDown">
							<input type="text" class="form-control" placeholder="Search">
							<span class="input-group-btn">
							<button class="btn-u" type="button">Go</button>
						</span>
						</div>
					</div>    
				</li>
			<!-- End Search Block -->
			</ul>
        </div><!--/navbar-collapse-->
    </div>    
</div>            
<!-- End Navbar -->