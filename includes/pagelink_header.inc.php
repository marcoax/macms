<?php

$objLinks = articoli::getLinks('links',' Sort asc');
$objLinksHtml= new simple_list();
$objLinksHtml->setAttributes( array("id" => "linkListPage", "class" => "list-unstyled"))->setData($objLinks->Data)->createList($curArticle,'<i class="fa fa-angle-right"></i> ','','opa');
