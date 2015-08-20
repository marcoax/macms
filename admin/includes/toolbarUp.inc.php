<?
  $dObjProfilo= new domini();
  $dObjProfilo->sa='Label';
  $dObjProfilo->order='Label';
  require_once(DIR_FS_CLASSES."provincie.class.php");
  $ObjProvincie= new provincie();
?>
<div id="toolbar">
	<div id="cercalabel">
		<span class="red">[</span>?<span class="red">]</span>&nbsp;<?php echo MSG_HELP_SEARCH?>
	</div>
	<div id="toolbar_cerca">
	<table cellpadding="3">
     <tr>
	    <?php if(in_array('data',$searchToolbar)):?>
	    <td>
		Data<br>
		<input class="datafield" name="<?php echo $mainTab?>.Data" id="date-from" onchange="validazione()"/>
		</td>
		<?php endif
		<?php if(in_array('areetematiche',$searchToolbar)):?> 
		<td><?php echo CL_GRUPPI?><br>
			<select name="<?php echo $mainTab?>.Id">
			<option value=''><?php echo MSG_SELECT?></option>
			<?php echo $dObjProfilo->_ma_combo_p($objSez->Data->IdProfilo,'areetematiche');?>
			</select>
		</td>
		<?php endif
		<?php if(in_array('profilo',$searchToolbar)):?>
		
		<td>
			<?php echo CL_PROFILE?><br>
			<select name="<?php echo $mainTab?>.IdProfilo" class="short">
			<option value=''><?php echo MSG_SELECT?></option>
			<?php echo $dObjProfilo->_ma_combo_p($objSez->Data->IdProfilo,'profilo');?>
			</select>
		</td>
		<?php endif
		<?php if(in_array('citta',$searchToolbar)):?> 
		<td>Citta<br>
			<select name="<?php echo $mainTab?>.City" class="short">
			<option value=''><?php echo MSG_SELECT?></option>
			<?php echo $dObjCitta->_ma_combo_d('','');?>
			</select>
		</td>
		<?php endif 
		<?php if(in_array('provincia',$searchToolbar)):?>  
		<td>Provincia<br>
			<select name="<?php echo $mainTab?>.State">
			<option value=''><?php echo MSG_SELECT?></option>
			<?php echo $ObjProvincie->_ma_combo_d($objSez->Data->State,'IdNazione=50');?>
			</select>
		</td>
		<?php endif
		<?php if(in_array('areetematiche',$searchToolbar)):?> 
		<td>Area Tematica<br>
			<select name="<?php echo $mainTab?>.IdAreaTematica">
			<option value=''><?php echo MSG_SELECT?></option>
			<?php echo $dObjProfilo->_ma_combo_p($objSez->Data->IdProfilo,'areetematiche');?>
			</select>
		</td>
		<?php endif
		<!-- <?php if(in_array('azione',$searchToolbar)):?> 
		<td>Azione<br>
			<select name="<?php echo $mainTab?>.IdAzione">
			<option value=''><?php echo MSG_SELECT?></option>
			</select>
		</td>
		<?php endif
		<?php if(in_array('attivita',$searchToolbar)):?> 
		<td>Attivita<br>
			<select name="<?php echo $mainTab?>.IdAttivita">
			<option value=''><?php echo MSG_SELECT?></option>
			<?php echo $dObjProfilo->_ma_combo_p($objSez->Data->IdProfilo,'attivita');?>
			</select>
		</td>
		<?php endif -->
		<?php if(in_array('regione',$searchToolbar)):?> 
		<td><?php echo CL_REGIONE?><br>
			<select name="<?php echo $mainTab?>.IdRegione">
			<option value=''><?php echo MSG_SELECT?></option>
			<?php echo $dObjProfilo->_ma_combo_p($objSez->Data->IdProfilo,'regioni');?>
			</select>
		</td>
		<?php endif
		  <td><?php echo MSG_HELP_SEARCH_FREE?><br/><input type="text" size="20" name="parola" style="font-size:10px" class="short" value=<?php echo $parolaRicerca?>><td>
	      <td>&nbsp;<br>
	 <input class="button" value="Trova"   onClick="document.forms[0].page.value=1;document.forms[0].Id.value='';document.forms[0].submit();return false">
	     </td>
	  <tr>
	</table>          
	</div>
</div>

 
