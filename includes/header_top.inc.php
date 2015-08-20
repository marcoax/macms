<!-- Topbar -->
<div class="topbar bck-color-2">
    <div class="container">
        
        <!-- Topbar Navigation -->
        <ul class="loginbar pull-right">
            <li class="hoverSelector">
                <b><i class="fa fa-globe color-2"></i><a class="color-3"> <?php echo CL_LINGUA?></a></b>
                <ul class="lenguages hoverSelectorBlock">
                	<?php if( $webApp->config->isMultiLang == true ) echo Tool::ma_lang_handler(  $webApp->config->langList  ,$lang,'');?>
               </ul>
            </li>
            
        </ul>
        <ul class="unstyled list-inline">
            <li class="color-2 hidden-xs">
                <?php echo CL_FOR_INFO?>
            </li>
            <li class="color-3">
            	<b><i class="fa fa-phone color-2"></i> <a href="tel:<?php echo  WEBSITE_PHONE?>"><?php echo  WEBSITE_PHONE?></a></b>
               
            </li>
            <li class="color-3">
            	<b><i class="fa fa-envelope color-2"></i> <?php echo  ma_html_builder::ma_helper_mailto()?></b>             
            </li>
            
        </ul>
        <!-- End Topbar Navigation -->
    </div>
</div>
<!-- End Topbar -->
