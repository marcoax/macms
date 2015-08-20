<?php if(ma_getParameter('loggedCms')=='1' && ma_getParameter('isAdmin')=='1'):?>
<ul class="nav navbar-nav navbar-right" id="main-menu-right" role="navigation" style="margin-top:0px">
 	 <li class="dropdown">
            <a role="button" class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-setting"></i><?php echo CL_PAGE_TITLE_SETTINGS ?>  <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
				<?php if(ma_getParameter('Permission')=='su'):?>
					<li><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=dominio&Id_sub=profilo"?>"><?php echo  CL_PROFILO?></a></li>
					<li class="divider"></li>
					<li ><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=sitelang&Id_sub="?>"><?php echo CL_PAGE_TITLE_SITE_LANG?></a></li>
					<li class="divider"/>
					<li><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=options&Id_sub=media"?>"><?php echo CL_PAGE_TITLE_MEDIA_CONFIG?></a></li>
					<li><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=options&Id_sub=applicationconfig"?>"><?php echo CL_PAGE_TITLE_APPLICATIONCONFIG_CONFIG?></a></li>
					<li><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=options&Id_sub=seoconfig"?>"><?php echo CL_PAGE_TITLE_SEO_CONFIG?></a></li>
					<li class="hidden"><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=options&Id_sub=newsletter"?>"><?php echo CL_PAGE_TITLE_NEWSLETTER?></a></li>
					<li class="divider"/>
					<li ><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=template&Id_sub="?>"><?php echo CL_TEMPLATE?></a></li>
				  <li><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=options&Id_sub=pp"?>"><?php echo CL_PAGE_TITLE_PAYPAL_CONFIG?></a></li>
					
				<?php endif?>
				  
					<li><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=options&Id_sub=website"?>"><?php echo CL_PAGE_TITLE_WEBSITE_CONFIG?></a></li>
					<li><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=dominio&Id_sub=tipoimmagine"?>"><?php echo CL_TIPO_IMMAGINE?></a></li>
					<li class="divider"/>
					<li><a href="<?php echo DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=user"?>"><?php echo  CL_PAGE_TITLE_USER ?> List</a></li>
					<li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=user&Id_sub=&mode=up"><?php echo  MSG_HELP_ADD_USER?></a></li>
			</ul>
     </li>    
     <li class="divider-vertical"></li>
     <li class="dropdown">
            <a role="button" class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> <?php echo  ma_getParameter('NomeUtente')?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
            	<li><a href="<?php echo DIR_WS_CMS.FILENAME_EDIT?>.php?mode=edit&Id_sez=user&Id_sub=&Id=<?php echo  $_SESSION[uid];?>"> <i class="icon-user"></i> <?php echo  CL_YOUR_PROFILE?></a></li>
		     	<li class="hide"><a href="<?php echo  FILENAME_EDIT?>.php?mode=edit&Id_sez=anagraficautenti"><i class="icon-user"></i> <?php echo  CL_YOUR_PROFILE?></a></li>
			    <li class="divider hide"></li>
			    <li><a href="<?php echo  FILENAME_LOGOUT?>.php"><i class="icon-off"></i> <?php echo  CL_LOGOUT?></a></li>
			</ul>
     </li>                   
</ul>
<?php elseif ($curPage!='index'):?>
<ul class="nav pull-right" id="main-menu-right" role="navigation" style="margin-top:0px">
 	<li class="dropdown">
          <a role="button" class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> <?php echo  ma_getParameter('NomeUtente')?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
            	<li><a href="<?php echo  DIR_WS_CMS.FILENAME_EDIT?>.php?mode=edit&Id_sez=user&Id_sub=&Id=<?php echo  $_SESSION[uid];?>"> <i class="icon-user"></i> <?php echo  CL_YOUR_PROFILE?></a></li>
		     	<li class="hide"><a href="<?php echo  FILENAME_EDIT?>.php?mode=edit&Id_sez=anagraficautenti"><i class="icon-user"></i> <?php echo  CL_YOUR_PROFILE?></a></li>
			    <li class="divider hide"></li>
			    <li><a href="<?php echo  FILENAME_LOGOUT?>.php"><i class="icon-off"></i> <?php echo  CL_LOGOUT?></a></li>
			</ul>
     </li>                   
</ul>
<?php endif?><!--/.nav-collapse -->