<?
    $objDocsList= new documentiversioni();
    if($_POST['curIdDoc'])$objDocsList->removeItem(ma_getParameter('curIdDoc'));
    $objDocsList->setIdDocumento($Id);
    $objDocsList->getList();
    $dataDoc=$objDocsList->getData();
?>

<h3 class="separatoreTop"><?php echo CL_VERSIONI?><h3>
<table >
<?
  if($dataDoc){
   $maxEle=count($dataDoc);
   foreach($dataDoc as $d){
    $label=($d->Label)?$d->Label:$d->Doc;
    $label="- ".CL_VERSIONE." ".$maxEle--;
    $filePath=ma_helper_doc_link($d->Doc,'doc','red',$label);
    $htmlDocsList.="<tr>\n";
    $htmlDocsList.="<td> ".$filePath."</td>\n";
    $htmlDocsList.="<td> &nbsp;&nbsp;</td>\n";
    if($isModal!=1)$htmlDocsList.="<td> [ - ] <a href=\"#\"  onclick=\"delDocVersion('del','".$d->Id."')\">".MSG_HELP_DELETE."</a> </td>\n";
    $htmlDocsList.="</tr>\n";
   }
  }
  else $htmlDocsList=MSG_NO_DOCVERSION;
  echo $htmlDocsList;
?>
</table>


