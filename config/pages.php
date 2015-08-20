<?php
    'articoli'=> array(
     'contatti'=> array(
		'delete'=>1,
		'archivio'=>'no',
		'save'=>1,
		'help'=>0,
		'copy'=>1,
		'add'=>1,
        'addlist'=>1,
		'view'=>0,
		'print'=>1,
		'list'=>1,
		'selbox'=>1,
		'edit'=>1,
		'export'=>1,
		'jsVal'=>'anagraficautenti',
		'titolo'=>CL_PAGE_TITLE_USERS,
		'actiontoolbar'=>'aggiungi',
		'searchToolbar'=>'',
		'layoutEdit'=>'SmallDx',
		'layoutView'=>'Small',
		'isbreadCrumbs'=>'1',
		'isEditorArea'=>0,
        'searchfileds'=>'1',
        'footerbottom'=>'1',
	),
	 'settings'=> array(
		'delete'=>0,
		'archivio'=>'no',
		'save'=>1,
		'help'=>0,
		'copy'=>0,
		'add'=>0,
        'addlist'=>1,
		'view'=>0,
		'print'=>1,
		'list'=>1,
		'selbox'=>1,
		'edit'=>0,
		'export'=>1,
		'jsVal'=>'anagraficautenti',
		'titolo'=>CL_PAGE_TITLE_SETTINGS,
		'actiontoolbar'=>'aggiungi',
		'searchToolbar'=>'',
		'layoutEdit'=>'SmallDx',
		'layoutView'=>'Small',
		'isbreadCrumbs'=>'1',
		'isEditorArea'=>0,
        'searchfileds'=>'0',
        'footerbottom'=>'1',
	),
	 'dominio'=> array(
        'view'=>0,
		'add'=>1,
        'addlist'=>1,
        'delete'=>1,
        'archivio'=>0,		
        'save'=>1,
        'print'=>0,
        'help'=>0,
        'preview'=>0,
        'copy'=>1,
        'selbox'=>1,
         'list'=>1,
        'titolo'=>'',
         'edit'=>1,
         'thumb'=>1,
		'actiontoolbar'=>'aggiungi',
        'searchToolbar'=>'',
        'layoutView'=>'Small',
		'layoutEdit'=>'SmallDx',
        'searchfileds'=>'0',
        'footerbottom'=>'1',
    ),
       'emailmsg'=> array(
        'delete'=>1,
        'archivio'=>'no',
        'save'=>1,
        'print'=>0,
        'help'=>0,
        'copy'=>1,
        'add'=>1,
        'addlist'=>1,
		'view'=>0,
        'list'=>1,
        'selbox'=>ma_getParameter('isAdmin'),
        'edit'=>1,
		'thumb'=>1,
		'jsVal'=>'articoli',
        'titolo'=>CL_PAGE_TITLE_PAGES,
		'actiontoolbar'=>'aggiungi',
		'searchToolbar'=>'',
		'layoutEdit'=>'SmallDx',
		'layoutView'=>'Small',
        'isbreadCrumbs'=>'1',
		'isEditorArea'=>1,
		'schede'=>'Main#1,Label#1,Description#1',
        'searchfileds'=>'0',
        'footerbottom'=>'1',
     ),
    'options'=> array(
    
    /***********************bottoni*********************/
    $archiveButt	= $label[$Id_sez]['archivio'];
    $editButt		= $label[$Id_sez]['edit'];
	$add			= $label[$Id_sez]['add'];// bottone  per  l'add
    $backbtn		= $label[$Id_sez]['backbtn'];// bottone  js back
	$addButton		= $label[$Id_sez]['addlist'];// bottone  add in list
	$configDoc		= $label[$Id_sez]['configDoc'];// bottone per  creare il  pdf
   
    $footerbottom  	= $label[$Id_sez]['footerbottom'];// footer fixed bottom
	$copyButton    	= $label[$Id_sez]['copy'];
    $listButton   	= $label[$Id_sez]['list'];
	$saveButt		= ($isUser)?'1':$label[$Id_sez]['save'];
    $view			= $label[$Id_sez]['view'];
	$viewModal		= $label[$Id_sez]['viewModal'];
    $selbox			= (ma_get_page()!='home')?$label[$Id_sez]['selbox']:'';
    $delButton		= (ma_get_page()!='home' )?$label[$Id_sez]['delete']:'';
    $printButt		= $label[$Id_sez]['print'];
    $previewButt	= $label[$Id_sez]['preview'];
    $helpButt		= $label[$Id_sez]['help'];
	$xmlButton		= ($isUser)?'0':$label[$Id_sez]['xml'];
	$exportButton	= $label[$Id_sez]['export'];

     /*******************************azioni******************************/
    $actionToolbar	= explode(',',$label[$Id_sez]['actiontoolbar']);
	$searchToolbar	= explode(',',$label[$Id_sez]['searchToolbar']);
	/***********************************layout****************************/
	
	$layoutEdit		= ($label[$Id_sez]['layoutEdit'])?$label[$Id_sez]['layoutEdit']:'';
	$layoutView		= ($label[$Id_sez]['layoutView'])?$label[$Id_sez]['layoutView']:'';
	/*****************************************abilitazione  thumb*****************/
	$isThumb		= $label[$Id_sez]['thumb'];
	$thumbW			= $label[$Id_sez]['thumbW'];
	$thumbH			= $label[$Id_sez]['thumbH'];
	/******************************************js******************************/
	$jsVal			= (!empty($label[$Id_sez]['jsVal']))?$label[$Id_sez]['jsVal']:$Id_sez;
    

   //array  that  contains  multitable  page
	$multiTable=  array(
	    TABLE_TAG,
        TABLE_CATEGORYTREE_DESCRIZIONI,
		TABLE_DOMINI_DESCRIZIONI,
	);
	$multiUpdate =array(
		TABLE_DOMINI,
        TABLE_CATEGORYTREE,
        TABLE_DOCUMENTI,
		TABLE_ATTIVITA,
		TABLE_MEDIA,
		TABLE_ARTICLE
	);