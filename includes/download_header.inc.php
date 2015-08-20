<?php

 
 $objDownload     = articoli::getLinks('download');
 $objDownloadList = new boostrapThumb();
 $objDownloadList->setData($objDownload ->Data)->setIsDoc(true)->createPageThumb('docList','col-sm-6 col-md-3');

