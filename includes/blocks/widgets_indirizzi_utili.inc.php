<?php

$objLinks = articoli::getLinks('links',' Sort asc');
$objLinksHtml= new simple_list();
$objLinksHtml->setAttributes( array("id" => "linkList", "class" => "list-unstyled"))->setData($objLinks->Data)->createList($curArticle,'<i class="fa fa-angle-right"></i> ','','opa');

?>

<div class="posts margin-bottom-20">
    <div class="headline headline-md"><h2><?php echo  CL_LINK?></h2></div>
    <?php echo $objLinksHtml->render()?>
</div>