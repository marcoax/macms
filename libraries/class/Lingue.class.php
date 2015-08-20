<?php

class Lingue  extends commonQuery{

    var $Id;
    var $Label;
    var $Sort;
    var $Code;
    var $Disable;

   // iniziallizzo l a  classer
    function Lingue($Code=''){
      global $DBH;
      $this->Label='';
      $this->Sort='';
      $this->Id='';
      $this->Code=$Code;
      $this->Disable='';
      $this->db=$DBH;;
	  $this->tablename= TABLE_CMR_SCHEDA_LINGUE;
      $this->suffix= 'lng';
	  $this->sa          = $this->suffix.'.Code';
      $this->sb         = $this->suffix.'.Label';
	  $this->a          = $this->suffix.'.Code';
      $this->b         = $this->suffix.'.Label';
      $this->Order      = $this->suffix.'.Sort ';
     
    }

     protected static $instance = null;

    public static function getInstance()
    {
        if ( null === self::$instance )
            self::$instance = new self;

        return self::$instance;
    }
    // becco i dati
    function getQuery(){
     $query="Select *
             from ".TABLE_CMR_SCHEDA_LINGUE."
             $this->where
             order by Sort
            ";
			$this->stmt = $this->db->query($query);
			$this->stmt->setFetchMode(PDO::FETCH_OBJ); 
            $this->dataList=$this->stmt->fetchAll();
            //$this->dataList=$this->stmt->fetch();
      return $this->dataList;
    }


    function setWhere($a,$b){
        if(!is_object($this->objWhere))$this->objWhere = new where;
        $this->where=$this->objWhere->setEq($a,$b);
        return $this->where;
    }

   // becco i dati
   function getLista($isPub=''){
      $isPubWhere=($isPub)?' and Pub=1':'';
      $query="Select Code as  a, Label as b
             from ".TABLE_CMR_SCHEDA_LINGUE."
             where 1 ".$isPubWhere."  and Disable=0
             order by Sort
      ";
      $this->stmt = $this->db->query($query);
	  $this->stmt->setFetchMode(PDO::FETCH_OBJ); 
      $this->dataList=$this->stmt->fetchAll();
	  $this->defLang=$this->dataList[0]->a;
	  $this->nLang=count($this->dataList); 
      return $this->dataList;
   }
}


class HTMLLingue extends Lingue {
    function HTMLLingue(){
       $this->Lingue();
       $this->where='';
    }

    function createHTML($mainTab='',$Id,$IdTipo,$n=1,$IdPage='',$dlang='',$label='') {  
	  global $curMode;
	   global $Id_sez;
       $html='';
       $i=$n;
       $this->mainTab=$mainTab;
       
       
       $IdPage=($IdPage!='')?$IdPage:$Id_sez;// se no setto il  tipo
	   $label=($label!='')?$label:$IdTipo;// se no setto il  tipo
	   $this->IdTipo=$IdTipo;
       $this->FieldSize=(String::ma_not_null($this->FieldSize))?$this->FieldSize:600;
	   $this->TetxAreaSize=(String::ma_not_null($this->TetxAreaSize))?$this->TetxAreaSize:'"cols=100" rows="10"';
       $this->cssStyle=($this->cssStyle)?$this->cssStyle:'campo';
       $this->extraMsg=stripslashes($this->extraMsg);
       foreach ($this->dataList as $d){
       	 
          if(!empty($Id)){$data=$this->getData($d->Code,$Id,$IdPage);
              if(empty($this->dataVoci->Id) ){
              		
              	$this->dataVoci->Id=$this->insertNewLang($d->Code,$Id);
			  
			  }
          }
		  
          if($d->Code==$dlang or $dlang==''){
          $html.="<input type=\"hidden\"  name=\"".$this->mainTab.".Id:".$i."\" value=\"".$this->dataVoci->Id."\">\n";

          $html.="<input type=\"hidden\"  name=\"".$this->mainTab.".Lingua:".$i."\" value=\"".$d->Code."\">\n";
          $html.="<input type=\"hidden\"  name=\"".$this->mainTab.".IdOpzioni:".$i."\" value=\"".$Id."\">\n";
		  $html.="<input type=\"hidden\"  name=\"".$this->mainTab.".IdTipo:".$i."\" value=\"".$this->IdTipo."\">\n";
		  $html.="<input type=\"hidden\"  name=\"".$this->mainTab.".IdPage:".$i."\" value=\"".$IdPage."\">\n";
          $html.="<tr class=\"txtsmall\">\n";
               $html.="<td  valign=\"top\" >\n";
               $html.="<label>".$label."</label>";
               if(String::ma_not_null($this->extraMsg)) $html.=" ".$this->extraMsg."<br><br>";
               $jsCount="";
               if(String::ma_not_null($this->showCount)){
               	    $jsCount="onkeydown=\"countChars('".$this->mainTab.".Label:".$i."','".$this->mainTab.".lengthT:".$i."','".$this->showCount."')\"
			                  onkeyup=\"countChars('".$this->mainTab.".Label:".$i."','".$this->mainTab.".lengthT:".$i."','".$this->showCount."')\"
			       ";
               }
               $html.="</td>\n";
               if($this->type=="input"){
			      $html.="<td><input  type=\"text\" style=\"width:".$this->FieldSize."px\"  
			                                             name=\"".$this->mainTab.".Label:".$i."\" 
			                                             id=\"".$this->mainTab.".Label:".$i."\"
			                                             value=\"".stripslashes($this->dataVoci->Label)."\"
			                                             ".$jsCount."	                  
			                  />";
               }
			   else {
			  
			     $html.="<td class=\"txtsmall\" valign=\"top\" nowrap>
			        <textarea ".$this->TetxAreaSize." 
			                  name=\"".$this->mainTab.".Label:".$i."\" id=\"".$this->mainTab.".Label:".$i."\" 
			                  ".$jsCount."
			                  class=\"".$this->cssStyle."\">".stripslashes($this->dataVoci->Label)."</textarea>\n";
			   }
			   if(String::ma_not_null($this->showCount)){
               	   $html.="<br/><input readonly=\"readonly\" name=\"".$this->mainTab.".lengthT:".$i."\" id=\"".$this->mainTab.".lengthT:".$i."\" size=\"3\" maxlength=\"3\" value=\"".strlen(stripslashes($this->dataVoci->Label))."\" type=\"text\" class=\"campoConta Warning\">\n";
                   
               }
              
			   
			   
			   $html.="</td>\n";
          $html.="</tr>";
		  }
          $i++;
       }
       $html.="<input  type=\"hidden\" name=\"".$mainTab.".Numero\"  id=\"".$this->mainTab.".Numero:".$i."\" value=\"".($i-1)."\">\n";
       $this->cItem=(int)$i-1;
       return $html;
    }



    //  function  create note

    function createNote($txt) {
       $html.="<tr class=\"txtsmall\">\n";
           $html.="<td class=\"txtsmall\" valign=\"top\" colspan=\"10\"><b>".$txt."</b></td>";
       $html.="</tr>";
       return $html;

    }


    function  getData($lang,$Id,$Id_sez) {
          $this->objVoci = new getVoci;
          $this->objVoci->setWhere('Lingua',$lang);
          $this->objVoci->setWhere('IdOpzioni',$Id);
		  $this->objVoci->setWhere('IdPage',$Id_sez);
		  $this->objVoci->setWhere('IdTipo',$this->IdTipo);
          $this->dataVoci=$this->objVoci->getQuery($this->mainTab);
        return  $this->dataVoci;
     }

    //  se  aggiungo una  nuova  lingua
    function insertNewLang($lang,$Id){
      $query="INSERT INTO
              ".$this->mainTab."(Id ,IdOpzioni ,Lingua)
              values ('',".$Id.",'".$lang."')";

     
	  $STH=$this->db->prepare($query);
   	  $STH->execute();
	  $this->insert_id=$this->db->lastInsertId();
      return $this->insert_id;
    }
	
	
	// qui setto  anche  il  tipo  del  campo di  imput della lingua
	//defualt text area
	function  setFieldType($type){
	  return $this->type=$type;
	}

    function  setFieldSize($size){
      return $this->FieldSize=$size;
    }
}
