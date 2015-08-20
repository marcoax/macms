<?php
// settom tutti i paragrafi  di configurazione
class  comboConf{
    function getDis ($field,$field2,$tab,$where='',$orderBy=''){
	      $where=(!empty($where))?"where ".$where:"";
          $orderBy=(!empty($orderBy))?$orderBy:$field2;
	      $this->query="SELECT DISTINCT ".$field." as a,".$field2." as b FROM ".$tab." ".$where. "  Group by  ".$field." order By ".$orderBy;
	      return $this->query;
	 }
  //  funzione  generica  che  prende  i dati da una tabella
   function getTable($a,$b,$tab,$whereV='',$whereF='',$order='',$mode=0,$flagOb=''){
       $where=(!empty($whereF))?"where ".$whereF."='".$whereV."'":"";
	   if($mode==1)$where=" where ".$whereF."=".$whereV;
	   if($mode==2)$where=" where ".$whereF."!='".$whereV."'";
	   if($mode==3)$where=" where ".$whereF." ";
	   $order=(!empty($order))?" order by  ".$order:"";
       if(empty($where))$where=" where 1";
       if(!empty($flagOb))$where.=" and FlagOb=0";
       $this->query="SELECT ".$a." as a, ".$b." as b  FROM ".$tab."  ".$where.$order;
	   return $this->query;
   
   }
   //function debugg
    function debug(){
	 echo $this->query."<br>";
	}
	   
 }

class  combo extends  comboConf {
   var $name;
   var $Quick;
   var $Inv;
   var $Mode;// setto il modo  doppio, triplo etc
   
   // setto  nome  della  combo
   function setName($name){
       $this->name=$name;
       return $this->name;
   }
   
  function  setInv() {
     $this->Inv=1;
     return $this->Inv;  
   }
   
   function  setMode($curMode) {
     // 2  doppio
     // 3 triplo
     // 4   array  e  non obj
     $this->Mode=$curMode;
     return $this->Mode;  
   }
  
  // funzioni per le combo 
  //vi valori sono  array da ciclare=$res, $curItem=item corrente per la selezione $name=metto anche il nome della selct, $inv=slection inversa se o uso il rs a  altrimenti il res b
  function makeSimpleCombo($res,$curItem,$tipo='',$stringaSel=''){

      $this->w_C='';
      if(!empty($res) ){

	    $this->getName();
		$this->getQuick();
		if($tipo=='stringa')$res=explode(',',$res);

	    foreach ($res as $re){
		
		//if(!is_object($re)) echo $re.'[]<br>';
		  // inverto
             $rea=$re->a;
             $reb=$re->b;

          if(is_array($curItem)){

             $rea=$re->a;
             $reb=$re->b;
		  	 if($this->Inv)$sel=(in_array($re->a,$curItem))?$sel="SELECTED":"";
			 else$sel=(in_array($re->b,$curItem))?$sel="SELECTED":"";


		  }
		 
		  else if($tipo=='stringa'){
            
            $re  = explode('#',$re);
            $rea = $re[0];
            $reb = (!empty($re[1]))?$re[1]:$re[0];
			
            if(!empty($stringaSel)){$sel=($re[0]==$curItem)?$sel="SELECTED":""; 
			  
            }
            else {
			   $sel=($reb==$curItem)?$sel="SELECTED":"";
			 }
		  } 
		  else {
              $rea=$re->a;
              $reb=$re->b;
			  	
              if($this->Inv)$sel=($re->a==$curItem)?$sel="SELECTED":"";
			  else$sel=($re->b==$curItem)?$sel="SELECTED":"";
		  }
           
		   //pulisci
          $reaP=stripslashes($re->a);
          $rebP=stripslashes($re->b);
          $rea=stripslashes($rea);
          $reb=stripslashes($reb);

          $this->w_C.="\n"; 
          if($this->Mode==2)$this->w_C.='<option value="'.$reaP.'" '.$sel.'>'.$rebP.'</option>';
	  	  else if($this->Mode==3)$this->w_C.='<option value="'.$rebP.'" '.$sel.'>'.$reaP.'</option>';
		  else if($this->Mode==4)$this->w_C.='<option value="'.$reb.'" '.$sel.'>'.$rea.'</option>';
          else if($this->Mode==6)$this->w_C.='<option value="'.$rea.'" '.$sel.'>'.$reb.'</option>';
		  else if($this->Mode==5)$this->w_C.='<option value="'.$reaP.'" '.$sel.'>'.$reaP.' - '.$rebP.'</option>';
		  else $this->w_C.='<option value="'.$reaP.'" '.$sel.'>'.$rebP.'</option>';
		 
		 }
	  if($this->name)$this->w_C.="</select>\n";
      return $this->w_C;
     }
}

  
   //restituisce  il blocco di codice crea il nome
   function getName(){
      $this->name=(!empty($this->name))?'name="'.$this->name.'"':'';
	  return $this->name;
   }


   
    function getQuick(){
    $this->Quick=(!empty($this->Quick))?'<option value=" " selected>Quick list</option>':'';
	return $this->Quick;
   }
   
   
  
}


// classe   che  mi costruisce  il  where
class where {
  function setWhere($where){
	   $this->where=$where;
	   return $this->where;
  }
  
   // aggiunge la  string al  where
  function addWhere($string){
	   $this->where=(!empty($this->where))?$this->where." and ".$string." ":"where ".$string." ";
	   return $this->where;
  }
  
   // aggiunge la  string al  where
  function setMacth($field,$string,$isBool=0,$isString=0){
       $string=trim($string);
       if($isString==1)$this->where='';
	   else $this->where=(!empty($this->where))?$this->where." and ":" where ";
       if($isBool=1) {
             $stringArr=explode(' ',$string);
             array_unique($stringArr);
             //print_r($stringArr);
             if(count($stringArr)>0) {
                 foreach($stringArr as $s) {
                   if(strlen($s)>3) {
                   if($stringQuery!='')$stringQuery.=' '; 
                   $stringQuery.='+'.$s.'*';
                   }
                 }
              
              }
            //print_r($stringArr);
            //$string=implode(' ',$stringArr);
          $this->where.="MATCH(".$field.") AGAINST('".$stringQuery."' IN BOOLEAN MODE)";   
       }
       else $this->where.="MATCH(".$field.") AGAINST('".$string."')";
	   return $this->where;
  }
  
  
  function setDiv($a,$b){
	   $this->where=(!empty($this->where))?$this->where." and ".$a."!=".$b:"where ".$a."!=".$b;
	   return $this->where;
  }

  function setF_I_S($a,$b){
       $this->where=(!empty($this->where))?$this->where." and ":" where ";
       $this->where.="FIND_IN_SET('".$b."',".$a.")";
       return $this->where;
  }

  function setLike($a,$b){
     $this->where=(!empty($this->where))?$this->where." and ".$a." like '%".$b."%'":"where ".$a." like '%".$b."%'";
     return $this->where;
  }

  function setEq($a,$b){
	   $this->where=(!empty($this->where))?$this->where." and ".$a."='".$b."'":"where ".$a."='".$b."'";
	   return $this->where;
  }
  function setEqN($a,$b){
	   $this->where=(!empty($this->where))?$this->where." and ".$a."=".$b:"where ".$a."=".$b;
	   return $this->where;
  }
  function setBet($a,$b,$c){
	   $this->where=(!empty($this->where))?$this->where." and  ".$a." BETWEEN ".$b." and ".$c:"where ".$a." BETWEEN ".$b." and ".$c;
	   return $this->where;
  }
  function setMin($a,$b){
	   $this->where=(!empty($this->where))?$this->where." and ".$a."<='".$b."'":"where ".$a."<'".$b."'";
	   return $this->where;
  }
  function setMagg($a,$b,$deli="'"){
	   $this->where=(!empty($this->where))?$this->where." and ".$a.">=".$deli.$b.$deli:"where ".$a."<".$deli.$b.$deli;
	   return $this->where;
  }
  
  function setDif($a,$start=0,$stop=30,$from="NOW()"){
	   $where=(!empty($this->where))?" and ":"Where ";
	   $this->where=$this->where.$where."TO_DAYS(".$a.")  - TO_DAYS(".$from.") >=".$start."  and   TO_DAYS(".$a.")  - TO_DAYS(".$from.")  < ".$stop;
	   return $this->where;
  }
  
  // giorni di   differenza
  function setDay($a="NOW()",$b,$day='10'){
     $where=(!empty($this->where))?" and ":"Where ";
     $this->where=$this->where.$where."(TO_DAYS(".$a.")-TO_DAYS(".$b.")) >10";
     return $this->where;
  }
  // null
  function setNull($a){
     $where=(!empty($this->where))?" and ":"Where ";
     $this->where=$this->where.$where." ". $a ." is NULL";
     return $this->where;
  }
  
  // null
  function setNotNull($a){
     $where=(!empty($this->where))?" and ":"Where ";
     $this->where=$this->where.$where." ". $a ." is NOT NULL";
     return $this->where;
  }
  
  function setOr($a){
     $where=(!empty($this->where))?" and ":"Where ";
     $this->where=$this->where.$where." (".$a.")";
     return $this->where;
  }
  

  // fucntion set Periodo
  // data Su // giorni di   differenza
  function setDataSub($a,$b,$c="MONTH"){
     $where=(!empty($this->where))?" and ":"Where ";
     $this->where=$this->where.$where." ".$a." > DATE_SUB(NOW(), INTERVAL ".$b." ".$c." )";
     return $this->where;
  }
  // ciclo  per  combo  con  multi  scelta
  function setEqArr($a,$b,$num='',$value=''){
      $num;
	  $this->where=(!empty($this->where))?$this->where." and (": " where  (";
	  $i=0;
	  $curEle='';
	  foreach($b as $data){
	    if($i!=0)$this->where.=" or ";
		if($value)$this->where.=$a.$data."='".$value."'";  // verifico  se il valore  del  campo � uguale a quello che passo
	    else if($num)$this->where.=$a.$data."='".$data."'"; //  incremento il  valor del campo
		else $this->where.=$a."='".$data."'";
	    $i++;
	  }
	  $this->where.=')';
	  
	  return $this->where;
  
  }

  // array Mix   $a=campo, $b= array  valori, $extra= campo opzionale  se il contenuto e testo
  function setIN($a,$b,$extra=''){
    $this->where=(!empty($this->where))?$this->where." and (": " where  (";
  	foreach ($b as $data){
	    //se numero aggiungo
		if(is_numeric($data)){
			if($n)$n.=','.$data; //metto la  virgola
			else $n.=$data; // se  il primo non metto la  virgola
		}
	    // altrimenti alla  lista  delle lettere
		else {
		    	if($s)$s.=",";
				$s.="'".$data."'";
	    }
	}

	if($n){
	   $this->where.=$a.' IN ('.$n.') ';
	   if($s) $this->where.=' or ';
    }
    if($s)$this->where.='  '.$extra.' IN ('.$s.')';
    $this->where.=')';

    return $this->where;
  }

  
    function setNOTIN($a,$b,$extra=''){
    $this->where=(!empty($this->where))?$this->where." and (": " where  (";
  	foreach ($b as $data){
	    //se numero aggiungo
		if(is_numeric($data)){
			if($n)$n.=','.$data; //metto la  virgola
			else $n.=$data; // se  il primo non metto la  virgola
		}
	    // altrimenti alla  lista  delle lettere
		else {
		    	if($s)$s.=",";
				$s.="'".$data."'";
	    }
	}

	if($n){
	   $this->where.=$a.' NOT IN ('.$n.') ';
	   if($s) $this->where.=' or ';
    }
    if($s)$this->where.='  '.$extra.' NOT IN ('.$s.')';
    $this->where.=')';

    return $this->where;
  }
  
  // setto  doppio  array
  function setEqDoubleArr($tab,$a,$b){
  
	  $this->where=(!empty($this->where))?$this->where." and (": " where  (";
	  $i=0;
	  $curEle='';
	  
	  foreach($b as $data){
	    if($i!=0)$this->where.=" or ";
	    $this->where.=$tab.".".$a[$i]."='".$data."'";
	    $i++;
	  }
	  $this->where.=')';
	  
	  return $this->where;
  
  }
  
  // multi scelta multi field
  function setEqArrMulti($a,$b,$n){
   	  $this->where=(!empty($this->where))?$this->where." and (": " where  (";
	  $i=0;
	  $curEle='';
	  foreach($b as $data){
	    if($i!=0)$this->where.=" or ";
	   	  for($el=1;$el<=$n;$el++){
		       if($el!=1)$this->where.=" or ";
		       $this->where.=$a.$el."='".$data."'";
	  	  }
	    $i++;
	  }
	  $this->where.=')';
	  return $this->where;
  
  }
  // multi scelta multi field like
  function setLikeArrMulti($a,$b,$n){
   	  $this->where=(!empty($this->where))?$this->where." and (": " where  (";
	  $i=0;
	  $curEle='';
	  foreach($b as $data){
	    if($i!=0)$this->where.=" or ";
	   	  for($el=1;$el<=$n;$el++){
		       if($el!=1)$this->where.=" or ";
		       $this->where.=$a.$el." like '%".$data."%'";
	  	  }
	    $i++;
		$i;
	  }
	  $this->where.=')';
	  return $this->where;
  
  }
  //
  // ritorna  il where
  function getWhere(){
   $this->where;
   return $this->where;
  }

}


// class  che   fa  il group by

class groupBy {
 function setGroup($group){
    $this->group=" group by ". $group;
    return $this->group;
 }
}

class ordina {
    var $order;
	var $defOrderr;
	var $sortaMode;
	  
    //setto il sort
   function setdefOrder($defOrder){
	   $this->defOrder=(!empty($this->order))?' ,'.$defOrder:$defOrder;
	   return $this->defOrder;
		
   }
   
   function setOrder($order){
        $this->order=$order;
	   return $this->order;
    }
	
	
	function getMode(){
	       $this->sortaMode=(empty($_GET["ordinaMode"]))?" ":$_GET["ordinaMode"];
	       return $this->sortaMode;
	  }
	  
	  //setto il mode
	  function setMode(){
	       $this->Mode=($this->sortaMode=='DESC')?"":"DESC";
	       return $this->Mode;
	  }
	
	  
	// faccio il sort
	function get0rder(){
	    $this->sorta=" Order By ".$this->order." ".$this->sortaMode." ".$this->defOrder;
	    return $this->sorta;
	}
}



class ordinaHeader extends ordina {
   //riistanzo il constructor princiaple
   function setOrder($order){
       $this->order=$order;
	   return $this->order;
    }
   //  funzione che fa l'etichetta
   function makeHeader($label,$type){
	   $full_path=explode("&sort=",getenv("REQUEST_URI"));
	   if($type==$this->order)$this->setMode();
	   else $this->Mode="";
	   $this->label='<a href="'.$full_path[0].'&ordina='.$type.'&ordinaMode='.$this->Mode.'" class="testoW"><strong>'.$label.'</strong></a>';
	   return $this->label;
	}
}

// classe  per  una  ricerca  semplice  di una sola  parola
class cerca{
  var $data;
  var $nW;
  
  //  set parameter
  function setData($data,$where){
    $this->data=addslashes($data);
	$this->w= new Where;
    $this->w->setWhere($where);
  }
  //becco le colonne se contengono un alias  prendo solo la prima parte
  function getCol(){
   	 $this->col = explode(",", $this->data);
	 return $this->col;
  }
  
  // costruisco il where
  function getWhere(){ 
     return $this->wSearch=$this->w->getWhere();
  }
  
   // costruisco il where
  function setWhereLike(){ 
     if($this->wSearch=="")$where=" Where ";
     else $where.=$this->wSearch."  and (";
  	 $this->where=$where;
	 return $this->where;
  }

  function getQueryLike($curParola){
     $this->getWhere();
     $this->setWhereLike();
     $this->getCol();
  	 $i=0;
	 foreach($this->col as $c ){
	    $this->pulisci($c);
		$cp=$this->cS;
     	if($i!=0)$this->where.=" or ";
     	$this->where.=$cp ." LIKE '%".$curParola."%'" ;
     	$i++;
 	 }
	
	 if($this->wSearch!="")$this->where.=')';
     $this->w->setWhere($this->where);
  }
 
 // gestiscele  queri normali  
   function getQuery(){
     $this->getCol();
  	  foreach($this->col as $c ){
	    $cField=str_replace('.','_',$c);
        if(String::ma_not_null(ma_getParameter($cField))){ 
           $this->w->setEq($c,ma_getParameter($cField));
        }
     }
    
   }

   // pulisci  la stringa se contiene un as 
   function pulisci($str){
      $cS=explode(' as ',$str);
	  $curFiled=explode(')',trim($cS[0]));
	  $pos=strpos($curFiled[0], "oncat");
      if($pos){}
      else {
	    return $this->cS=$curFiled[0];
	  }
   }
}


class ckTable{
  function ckTable($val){
     global $db;
     $this->db=$db;
     $this->val=explode(',',$val);
  }
 
  function createHTML($campo,$col=3,$linka=0,$id=0,$w=0){
     $i=1;
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
     return $userTable->makeTable();
  }

  function getData($query){
     $this->Lista=$this->db->get_results($query);
     return $this->Lista;
  }


  function createLink($value,$i){
       $html="<a href='#' onclick=\"DoChangesCheck('".$i."');return false\">".$value."</a>";
       return $html;
   }
function createLinkTab($value,$i){
       $html="<a href='#' onclick=\"DoChangesTabCheck('".$i."',event);return false\">".$value."</a>";
       return $html;
   }
}
