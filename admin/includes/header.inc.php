<header>	<nav class="navbar navbar-inverse navbar-fixed-top bottomonly-shadow">		<div class="container-full">	        <div class="navbar-header">	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">	            <span class="sr-only">Toggle navigation</span>	            <span class="icon-bar"></span>	            <span class="icon-bar"></span>	            <span class="icon-bar"></span>	          </button>	          <a class="navbar-brand" href="<?php echo  DIR_WS_CMS.FILENAME_START?>.php"><img src="<?php echo  DIR_WS_CMS_IMAGES?>logo.png" alt="<?php echo CMS_TITLE?>"  height="50px"/></a>	        </div><!-- / top + brand -->	        <?php if(ma_getParameter('loggedCms')=='1' && $curPage!='index'):?>				<div id="navbar" class="collapse navbar-collapse">					<ul class="nav navbar-nav">						<li class="dropdown">							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo  CL_PAGE_TITLE_ARTICOLI?> <b class="caret"></b> </a>							<ul class="dropdown-menu">								<li><a href="<?php echo  DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=articoli"?>"><?php echo  CL_LISTA?></a></li>								<li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=articoli&Id_sub=&mode=up"><?php echo  MSG_HELP_ADD_PAGE?></a></li>								<li class="divider"/>								<li><a href="<?php echo  DIR_WS_CATALOG?>it" target="_blank"><?php echo CL_VAI_WEB_SITE?></a></li>							</ul>						</li>													<li class="divider-vertical hidden"></li>						<li class="dropdown hidden">							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo  CL_PAGE_TITLE_SOCIAL_NETWORK?> <b class="caret"></b> </a>							<ul class="dropdown-menu">								<li><a href="<?php echo  DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=social"?>"><?php echo  CL_PAGE_TITLE_SOCIAL_NETWORK?> <?php echo  CL_LISTA?> </a></li>							</ul>						</li>												<li class="divider-vertical"></li>						<li class="dropdown ">							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo  articoli::ma_GetPageNameByCode('prodotti')?> <b class="caret"></b> </a>							<ul class="dropdown-menu">							<li><a href="<?php echo  DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=prodotti"?>"><?php echo  articoli::ma_GetPageNameByCode('prodotti')?> <?php echo  CL_LISTA?> </a></li>							</ul>						</li>												<li class="divider-vertical"></li>						<li class="dropdown">							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo  articoli::ma_GetPageNameByCode('slider')?> <b class="caret"></b> </a>							<ul class="dropdown-menu">							<li><a href="<?php echo  DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=lista&Id_sub=slider"?>"><?php echo  articoli::ma_GetPageNameByCode('slider')?> <?php echo  CL_LISTA?> </a></li>							</ul>						</li>						<li class="divider-vertical"></li>						<li class="dropdown">							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo  CL_PAGE_TITLE_ATTIVITA?> <b class="caret"></b> </a>							<ul class="dropdown-menu">							<li><a href="<?php echo  DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=eventi"?>"><?php echo  CL_PAGE_TITLE_ATTIVITA?> <?php echo  CL_LISTA?> </a></li>							<li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=eventi&Id_sub=&mode=up"><?php echo  MSG_HELP_ADDITEM?></a></li>							</ul>						</li>												<li class="divider-vertical"></li>						<li class="dropdown">							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo  articoli::ma_GetPageNameByCode('download')?><b class="caret"></b> </a>							<ul class="dropdown-menu">							<li><a href="<?php echo  DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=download"?>"><?php echo articoli::ma_GetPageNameByCode('download')?> <?php echo  CL_LISTA?> </a></li>							<li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=download&Id_sub=&mode=up"><?php echo  MSG_HELP_ADDITEM?></a></li>							</ul>						</li>						<li class="divider-vertical hidden"></li>						<li class="dropdown hidden">							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo  CL_PAGE_TITLE_DONATORI ?><b class="caret"></b> </a>							<ul class="dropdown-menu">							<li><a href="<?php echo  DIR_WS_CMS.FILENAME_LISTA.".php?Id_sez=donatori"?>"><?php echo  CL_LISTA?></a></li>							<li><a href="<?php echo FILENAME_EDIT?>.php?Id_sez=donatori&Id_sub=&mode=up"><?php echo  MSG_HELP_ADD_DONATORE?></a></li>							</ul>						</li>					</ul><!--/.main -bar  -->					<?php if(ma_get_page()!='index')require_once(DIR_FS_CMS_BLOCKS."/menuBar.inc.php");?>				</div><!--/.nav-collapse -->			<?php endif?> 	      </div>	</nav>	<?php if(ma_get_page()!='index'):?>		<div class="clearfix"></div>		<div class="sub-navbar">			<?php 						  $dObjStatoDoc     = new dominio();			  $dObjStatoDoc->sa = 'Valore';			  $dObjTipoDoc      = new dominio();			  $dObjTipoDoc->sa  = ' Valore';			  			 ?>			 <div class="subnavs bottomonly-shadow" id="toolbar_top" >			 					<div class="pull-right">					<div class="btn-group">						<?php if($configDoc==11 && ma_get_page()=='edit' &&  $mode=='edit'):?>							<a rel="tooltip" data-placement="bottom" data-original-title="<?php echo  MSG_CONFIGURA_PDF?>" href="<?php echo FILENAME_VIEW?>.php?Id_sez=<?php echo $Id_sez?>&Id_sub=<?php echo $Id_sub?>&mode=up" class="btn btn-default btn-large">								</a>						<?php endif?>						<?php if($saveButt && ma_get_page()!='view'):?>							<a  rel="tooltip" data-placement="bottom" data-original-title="<?php echo  MSG_HELP_SAVE?>" href="#" class="btn btn-default btn-large"  onclick="<?php echo $saveJs?>">								<?php echo boostrapHtml::createFaButton('fa-save  color-main')?>								</a>						<?php endif?>						<?php if($copyButton==1 && ma_get_page()=='edit' &&  $mode=='edit'):?>							<a href="#" rel="tooltip" data-placement="bottom" data-original-title="<?php echo  MSG_HELP_COPY?>" class="btn btn-default btn-large" onclick="<?php echo $urlCopy?>;return false"> 								<?php echo boostrapHtml::createFaButton('fa-copy  color-main')?>							</a>						<?php  endif?>						<?php if($previewButt==1 && ma_get_page()=='edit' &&  $mode=='edit'):?>							<a rel="tooltip" href="<?php echo Tool::cmsPreviewHandler($objSez->Data)?>" class="btn btn-default btn-large" target="_new" data-placement="bottom" data-original-title="<?php echo MSG_HELP_PREVIEW_PAGE?>">								<?php echo boostrapHtml::createFaButton('fa-eye  color-main')?>															</a>						<?php endif?>						<?php if($add==1  && ma_get_page()!='view'):?>							<a rel="tooltip" data-placement="bottom" data-original-title="<?php echo  MSG_HELP_ADDNUOVO?>" href="<?php echo FILENAME_EDIT?>.php?Id_sez=<?php echo $Id_sez?>&Id_sub=<?php echo $Id_sub?>&mode=up" class="btn btn-default btn-large">								<?php echo boostrapHtml::createFaButton('fa-plus  color-main')?>							</a>						<?php endif?>					</div> 				</div> 				<?php include(DIR_FS_CMS_BLOCKS."handlerBar.inc.php")?> 			</div>		</div>	<?php endif?> </header><div class="container" id="boxBebug"><div class="row">    <?php //if($_SESSION['Permission']=='su')echo "<br/>".$query;?>    </div><!--/row--></div><!-- /container -->	