<?php
//qui gestisco solo in  versioni  per  gli altri uso il modo  classico
require_once(DIR_FS_CLASSES."documentiversioni.class.php");
$objDocs= new documentiversioni();
$Doc=$_FILES['myNomeFile'][name];
$docType=ma_getParameter('docType');
// creo il file
if(!$_FILES['myNomeFile']['name']!='')
{
   $u = new MyUpload($Doc, $_FILES['myNomeFile']['tmp_name'], $_FILES['myNomeFile']['size']);
   $pathRepository=DIR_FS_REPOSITORY.$docType."/";

  echo ("-->{$pathRepository}<--");
   //verifico  che la dir attivit� ci sia
   
   if(!is_dir($pathRepository)){
      mkdir ($pathRepository, 0777);
   }
   
   //verifico  che la dir   attivit�/doctpe ci sia
   if(!is_dir($pathRepository)){
      mkdir ($pathRepository, 0777);
   }
   $u->setDir($pathRepository);
   $u->checkSize();
   //$u->checkFileExists();
   $result = $u->upload($pathRepository);
   if($result==1){
       $objDocs->setIdDocumento($Id);
       $objDocs->setDoc($Doc);
       $objDocs->addItem();
    }
  }
?>
<fieldset>
<table sclass="tableForma">
  <tr class="rowForm">
     <td class="txtsmall" align="right" valign="top" style="width:80px;">
      <b><?php echo CL_ALLEGATO."<br/>".MSG_HELP_MAX_FILE_SIZE?></b></td>
     <td>&nbsp;</td>
     <td>
    <input type="hidden" name="MAX_FILE_SIZE" value="100000000000"/>
    <input type="hidden" name="curIdDoc" value=""/>
    <input type="hidden" name="docType" value="doc"/>
    <input type="file" style="width:205px" id="myNomeFile" name="myNomeFile" class="campo"/>
     </td>
   </tr>
</table>
</fieldset>


