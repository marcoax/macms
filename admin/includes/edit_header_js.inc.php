<?php if($novalidazione!=1):?><script language="JavaScript" src="<?php echo $jsValFile?>" type="text/javascript"></script><?php endif?>
<script type="text/javascript">	 var mainTab="<?php echo $mainTab?>";	</script><script type="text/javascript" src="<?php echo  DIR_WS_CKEDITOR?>ckeditor.js"></script><script type="text/javascript" src="<?php echo  DIR_WS_CKEDITOR?>adapters/jquery.js"></script>
<script src="<?php echo  DIR_WS_CMS_JS?>vendor/jquery.uploadifive.min.js" type="text/javascript"></script><style>    .ui-autocomplete-loading {        background: white url('<?php echo  DIR_WS_CSS?>ui-lightness/images/ui-anim_basic_16x16.gif') right center no-repeat;    }    #city { width: 25em; }    </style>
   <script type="text/javascript">  $(function() {        	     $( "#sortable" ).sortable();
         $( "#sortable" ).disableSelection();
         
         $( "#sortable").sortable({
  			   update: function( event, ui ) {
  				var sorted = $( "#sortable" ).sortable( "serialize");
  				$.ajax({
	                 url: urlAjaxHandler+"update/sortList", 
	                 data:sorted,
	                 type: "GET",
	                 cache: false,
	                 success: function(code){
                 	 }
           		});
  			 }
		 })
         
         
                        $( "#shareUser" ).autocomplete({            source: function( request, response ) {                $.ajax({                    url: urlAjaxHandler+'suggest/user',                    dataType: "json",                    data: {                        featureClass: "P",                        style: "full",                        maxRows: 15,                        Id:$('#itemId').val(),                        name_startsWith: request.term,
                        IdUserActionType:$('#IdUserActionType').val()                    },                    success: function( result ) {                                            response( $.map( result.data, function( item ) {                        	                            return {                                label: item.b,                                value: item.b,                                id:item.a                            }                        }));                    }                });            },            minLength: 1,            select: function( event, ui ) {            	$('#shareUserList').val( ui.item.id);                console.log( ui.item ? "Selected: " + ui.item.id :  "Nothing selected, input was " + this.id);            },            open: function() {                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );            },            close: function() {                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );            }        });    });    </script>
    
    
<script type="text/javascript">
	<?php $timestamp = time();?>
	$(function() {
		$('#file_upload').uploadifive({
			'auto'             : true,
			//'checkScript'      : 'check-exists.php',
			'queueID'          : 'queue',
			'uploadScript'     : 'uploadifive.php',
			'onAddQueueItem' : function(file) {
					this.data('uploadifive').settings.formData = { 
					   'timestamp' : '<?php echo  $timestamp;?>',
					   'token'     : '<?php echo  md5('unique_salt' . $timestamp);?>',
					   'Id'        :  $('#itemId').val(),
					   'myImgLang' : '<?php echo  md5('unique_salt' . $timestamp);?>',
					   'myImgType' :  $('#myImgType').val(),
        			};
			},
			'onUploadComplete' : function(file, data) { 
				$("#docListBody").load(urlAjaxHandler+"update/getImageList/"+ $('#itemId').val());
			}
		});
	});


	</script>
<?php
 /* 
 
	if(CKEDITOR) {
		$(function() {
				
			 	CKEDITOR.replace('articoli_Descrizione', {
				  "filebrowserImageUploadUrl": "<?php echo DIR_WS_SITE?>ckeditor/plugins/imgupload/imgupload.php"
				});
				
				CKEDITOR.replace('articoli_Introsss', {
				  "filebrowserImageUploadUrl": "<?php echo DIR_WS_SITE?>ckeditor/plugins/imgupload/imgupload.php"
				});
		});
		
	
	}
	
	// ]]>
 */