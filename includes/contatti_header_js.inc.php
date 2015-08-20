<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<!-- JS Page Level -->           
<script type="text/javascript">


    var point;
    var map;
    var gdir;
    var infowindow
    var addressMarker;
	var lat  		='<?php echo GOOGLE_MAPS_API_LATITUDE?>'
	var long 		='<?php echo GOOGLE_MAPS_API_LONGITUDE?>';
	var id_page		="<?php echo $_GET['id_page']?>";
	var geocoder 	= null;
    var Indirizzo   ="<div class='mapPop'><b><?php echo WEBSITE_NAME?> [+]</b><br><?php echo GOOGLE_MAPS_API_INFO_WINDOW?></div>"
    var singlePoint = false; // se true  mette un solo punto sulla mappa
    <?php if($objPage->mapsIcon!=''):?>
     	var mapIcons='<?php echo $objPage->mapsIcon;?>';
    <?php else:?>
    	var mapIcons='<?php echo DIR_WS_IMAGES?>pointer.png';
    <?php endif?>
    var zoomLevel = <?php echo GOOGLE_MAPS_API_ZOOM_LEVEL?>
  	
  	
  	 var sites = [
		 <?php if($objPage->gMapData):?> <?php echo $objPage->gMapData?>
		 <?php else:?> ['<?php echo WEBSITE_NAME?>',lat,long,1,Indirizzo]
		 <?php endif?>
     ];
    jQuery(document).ready(function() {
        gMap.init();
       
    });
</script>
<script type="text/javascript" src="<?php echo  DIR_WS_JS?>ma_gmaps.js"></script>

