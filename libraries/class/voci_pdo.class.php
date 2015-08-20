<?php 
class getVoci {

    var $Id;
    var $IdOpzione;
    var $Label;
    var $Lingua;
    var $FlagOb;

   // iniziallizzo l a  classer
    function getVoci(){
      global $DBH;
      $this->db=$DBH;;
          }
    // becco i dati
    function getQuery($table){
         $query="Select *
             from ".$table."
             $this->where
             order by Lingua
            ";
			  
			  
			 $this->stmt = $this->db->query($query);
	         $this->stmt->setFetchMode(PDO::FETCH_OBJ); 
             $this->dataList=$this->stmt->fetch();
      return $this->dataList;
    }


    function setWhere($a,$b){
        if(!is_object($this->objWhere))$this->objWhere = new where;
        $this->where=$this->objWhere->setEq($a,$b);
        return $this->where;
    }



 }


class getTemplateVoci  {


    function getTemplateVoci($val){
     global $db;
     $this->db=$db;
     $this->val=explode(',',$val);
      }

    function createHTML($campo,$col=3,$linka=0,$id=0,$w=0){
     $i=1;
	 if(!empty($this->Lista)){
     foreach($this->Lista as $d){
         $field=$campo.'['.$d->a.']';
         $ce=(in_array ($d->a, $this->val))?1:0;
         if($linka==1)$d->b=$this->createLink($d->b,$i);
         if($linka==2)$d->b=$this->createLink($d->b,$campo."_".$i);
         if($linka==3)$d->b=$this->createLinkTab($d->b,$campo."_".$d->a);
		 
		 $seg[$i]=ceckBox::initBox($field,$ce,$d->b,$d->a);
		 $seg[$i]=$seg[$i]->writeBox();



         $i++;
     }

     $userTable= new table(0,$col,$seg);
     $userTable->setStyle(4,0,0,"testo",$id);
	 if(!empty($w))$userTable->setWidth($w);
	 return $this->VociList=$userTable->makeTable();
	 }
     else return CL_MSG_NOOPTION;
  }

  function getData($query){
     $this->Lista=$this->db->get_results($query);
     return $this->Lista;
   }

   function  createTab($mainTab,$IdOpzione){
      $this->IdOpzione=$IdOpzione;
      $tabHtml="\n<div class=\"Subtab\" id=\"sub_". $mainTab.".IdOpzioni_".$this->IdOpzione."\"  style=\"display:none\;position:relative\">\n";
      $tabHtml.=$this->VociList."\n";
	  $tabHtml.="<input name=\"".$mainTab.".IdOpzione[".$IdOpzione."]\" type=\"Text\" value=\"".$IdOpzione."\">\n\t";
	  $tabHtml.="\n</div>\n";
      return $tabHtml;
   }

}





class getSchedaVoci  {


    function getSchedaVoci($val,$valText=''){
      global $db;
      $this->db=$db;
      $this->val=explode(',',$val);
      $this->valText=explode(',',$valText);


    }

   function createHTMLCK($campo,$col=3,$w=0,$campoValore=''){
     $i=1;
     if(!empty($this->Lista)){
     foreach($this->Lista as $d){
         $field=$campo.'['.$d->a.']';
         $fieldValore=$campoValore.'['.$d->a.']';
         $ce=(in_array ($d->a, $this->val))?1:0;
         $seg[$i]=ceckBox::initBox($field,$ce,$d->b,$d->a);
         if(!empty($campoValore)) $seg[$i]=$seg[$i]->writeBox(). " <input  style=\"width:100px\"  name=\"".$fieldValore."\"  value=\"".$this->valText[$i-1]."\">\n";
         else $seg[$i]=$seg[$i]->writeBox();
         $i++;
     }

     $userTable= new table(0,3,$seg);
     $userTable->setStyle(4,0,0,"testo",$id);
     if(!empty($w))$userTable->setWidth($w);
     return $this->VociList=$userTable->makeTable();
     }
     else return CL_MSG_NOOPTION;
  }

  function createHTMLCOMBO ($campo){
     // initializzo la  classe  che  fa  la  combo
     $cTS= new combo;
     $cTS_d=$this->Lista;
     $cTS->setInv();
     $cTS->setMode(2);
     $cTS_w=$cTS->makeSimpleCombo($cTS_d,$this->val);
     $htmlC="<select style=\"width:200px\" name=\"".$campo."\">\n";
     $htmlC.="\t<option value=\"\">Please select</option>\n";
     $htmlC.=$cTS_w;
     $htmlC.="</select>\n";
     return $htmlC;
  }

  function getData($query){
     $this->Lista=$this->db->get_results($query);
     return $this->Lista;
  }


  function  createTextValue(){



  }






}

?>