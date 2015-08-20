<?php ?>
 <!-- Carousel ================================================== -->
<div id="pageCarousel_<?php echo $objCarId?>" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php 	$i = 0; 
		        foreach($objCarData->Data as $itemCar):
				$classItem = ($i ==0 ) ? "active":"";
					//sprint_r( $itemCar );
		?>

		<div class="item  <?php echo $classItem?>" style="background:red">
			<img   src="<?php echo ma_get_image_from_repsitory($itemCar->Img)?>" alt="<?php echo $itemCar->Name ?>"  border="0" class="img-responsive  pf0">
		</div>
	
		<?php $i++; endforeach?>
		
	</div>
	<a class="left  carousel-control carousel-control-mid" href="#pageCarousel_<?php echo $objCarId?>" data-slide="prev"><img src="<?php echo DIR_WS_IMAGES."arrow_back.png" ?>"/></a>
	<a class="right carousel-control carousel-control-mid" href="#pageCarousel_<?php echo $objCarId?>" data-slide="next"><img src="<?php echo DIR_WS_IMAGES."arrow_next.png" ?>"/></a>
</div><!-- /.carousel -->