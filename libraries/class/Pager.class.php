<?php 
/************************************************************************************** 
* Class: Pager 
* Author: Tsigo <tsigo@tsiris.com> 
* Methods: 
*         findStart 
*         findPages 
*         pageList 
*         nextPrev 
* Redistribute as you see fit. 
**************************************************************************************/ 
 class Pager 
  { 
  /*********************************************************************************** 
   * int findStart (int limit) 
   * Returns the start offset based on $_GET['page'] and $limit 
   ***********************************************************************************/ 
   var $curpageStep;
   function findStart($limit) 
    {

     if(String::ma_not_null($_POST['page'])){

        $_GET['page']=$_POST['page'];
     }




     if ((!isset($_GET['page'])) || ($_GET['page'] == "1"))
      { 
       $start = 0; 
       $_GET['page'] =1;
      } 

      {



        $start = ($_GET['page']-1) * $limit;
      } 


    
     return $start; 
    } 
  /*********************************************************************************** 
   * int findPages (int count, int limit) 
   * Returns the number of pages needed based on a count and a limit 
   ***********************************************************************************/ 
   function findPages($count, $limit) 
    { 
     $pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1; 

     return $pages; 
    } 
  /*********************************************************************************** 
   * string pageList (int curpage, int pages) 
   * Returns a list of pages in the format of "� < [pages] > �" 
   ***********************************************************************************/ 
function pageList($curpage,$pages,$stringaPercorso='',$stop='')
    {
    $curpage=($curpage)?$curpage:1;
	
	$curQ=explode("page",$_SERVER['QUERY_STRING']);
    if($stringaPercorso) $perc=$stringaPercorso."&amp;";
    else $perc.=($curQ[0])?$curQ[0]."&amp;":'';
	
    $this->maxPages=($this->maxPages && $pages>$this->maxPages)?$this->maxPages:$pages;
	
     $page_list  = "<ul class=\"pagination\">\n"; 
     
	  /* Print the first and previous page links if necessary */ 
     if (($curpage != 1) && ($curpage)) 
      { 
        if($this->useStep==1)$page_list .= "<li><a href=\"".$_SERVER['SCRIPT_NAME']."?".$perc."page=".($curpage-1)."\" title=\"First Page\" class=\"pager\">&laquo;</a>";
		else $page_list .= "<li><a href=\"".$_SERVER['SCRIPT_NAME']."?".$perc."page=1\" title=\"First Page\" class=\"pager\">&laquo;</a>"; 
	    $page_list .= $this->sep;
	    $page_list .="</li>\n"; 
      } 
     
	 $this->stopPages=$this->getStopPages($pages,$curpage);
	 $this->startPages=$this->stopPages-$this->maxPages+1;
       /* Print the numeric page list; make the current page unlinked and bold */ 
     for ($i=$this->startPages; $i<=$this->stopPages; $i++) 
      { 
	   
       
       if ($i == $curpage) 
        {
         $page_list .="<li class=\"active\">";	 
         $page_list .= "<a href=\"".$_SERVER['SCRIPT_NAME']."?".$perc."page=".$i."\" title=\"Page ".$i."\" class=\"pager\"><b class='pagerSu'>".$i."</b></a>"; 
        } 
       else if($this->dispPage($i,$curpage))
        {
        	$page_list .="<li>"; 
		    $page_list .= "<a href=\"".$_SERVER['SCRIPT_NAME']."?".$perc."page=".$i."\" title=\"Page ".$i."\" class=\"pager\">".$i."</a>"; 
        } 
      
	   if($i<$this->maxPages && $this->sep)$page_list .= $this->sep; 
	   else $page_list .= "";
	   
	   $page_list .="</li>\n";
      } 

    if (($curpage != $pages) && ($pages != 0)) 
      { 

       if($this->useStep==1)$page_list .= "<li>".$this->sep."<a href=\"".$_SERVER['SCRIPT_NAME']."?".$perc."page=".($curpage+1)."\" title=\"Last Page\" class=\"pager\">&raquo;</a></li>\n "; 
     
	   else $page_list .= "<li>".$this->sep."<a href=\"".$_SERVER['SCRIPT_NAME']."?".$perc."page=".$pages."\" title=\"Last Page\" class=\"pager\">&raquo;</a></li>\n "; 
      } 
     $page_list .= "</ul>\n"; 
     $this->perc=$perc; 
     return $page_list; 
    } 


function seoPageList($curpage,$pages,$stringaPercorso='',$stop='')
    {
    $curpage=($curpage)?$curpage:1;
	
	$curQ=explode("page",$_SERVER['QUERY_STRING']);
	
	$curPath = $_SERVER['REQUEST_URI'];
	$curPath = preg_replace('~(\?|&)page=[^&]*~','$1',$curPath);
    //if($stringaPercorso) $perc=$stringaPercorso."&amp;";
    $curPath.=(count($curQ)>1)?'&page=':'?page=';
	$curPath = str_replace('?&', '?', $curPath);
	$curPath = str_replace('&&', '&', $curPath);
    $this->maxPages=($this->maxPages && $pages>$this->maxPages)?$this->maxPages:$pages;
	
     $page_list  = "<ul class=\"pagination\">\n"; 
     
	  /* Print the first and previous page links if necessary */ 
     if (($curpage != 1) && ($curpage)) 
      { 
        if($this->useStep==1)$page_list .= "<li><a href=\"".$curPath.($curpage-1)."\" title=\"First Page\" class=\"pager\">&laquo;</a>";
		else $page_list .= "<li><a href=\"".$curPath."page=1\" title=\"First Page\" class=\"pager\">&laquo;</a>"; 
	    $page_list .= $this->sep;
	    $page_list .="</li>\n"; 
      } 
     
	 $this->stopPages=$this->getStopPages($pages,$curpage);
	 $this->startPages=$this->stopPages-$this->maxPages+1;
       /* Print the numeric page list; make the current page unlinked and bold */ 
     for ($i=$this->startPages; $i<=$this->stopPages; $i++) 
      { 
	   
       
       if ($i == $curpage) 
        {
         $page_list .="<li class=\"active\">";	 
         $page_list .= "<a href=\"".$curPath.$i."\" title=\"Page ".$i."\" class=\"pager\"><b class='pagerSu'>".$i."</b></a>"; 
        } 
       else if($this->dispPage($i,$curpage))
        {
        	$page_list .="<li>"; 
		    $page_list .= "<a href=\"".$curPath.$i."\" title=\"Page ".$i."\" class=\"pager\">".$i."</a>"; 
        } 
      
	   if($i<$this->maxPages && $this->sep)$page_list .= $this->sep; 
	   else $page_list .= "";
	   
	   $page_list .="</li>\n";
      } 

    if (($curpage != $pages) && ($pages != 0)) 
      { 

       if($this->useStep==1)$page_list .= "<li>".$this->sep."<a href=\"".$curPath.($curpage+1)."\" title=\"Last Page\" class=\"pager\">&raquo;</a></li>\n "; 
     
	   else $page_list .= "<li>".$this->sep."<a href=\"".$curPath.$pages."\" title=\"Last Page\" class=\"pager\">&raquo;</a></li>\n "; 
      } 
     $page_list .= "</ul>\n"; 
     $this->perc=$perc; 
     return $page_list; 
    } 
  /*********************************************************************************** 
   * string nextPrev (int curpage, int pages) 
   * Returns "Previous | Next" string for individual pagination (it's a word!) 
   ***********************************************************************************/ 
   function nextPrev($curpage, $pages) 
    { 
     $next_prev  = ""; 

     if (($curpage-1) <= 0) 
      { 
       $next_prev .= "Previous"; 
      } 
     else 
      { 
       $next_prev .= "<a href=\"".$_SERVER['SCRIPT_NAME']."?page=".($curpage-1)."\">Previous</a>"; 
      } 

     $next_prev .= " | "; 

     if (($curpage+1) > $pages) 
      { 
       $next_prev .= "Next"; 
      } 
     else 
      { 
       $next_prev .= "<a href=\"".$_SERVER['SCRIPT_NAME']."?page=".($curpage+1)."\">Next</a>"; 
      } 

     return $next_prev; 
    }
	
	
	// display the  numbero of  the  page
	function dispPage($i,$curpage){
      $lista=true;
	  if(String::ma_not_null($this->curpageStep)){
	    if($i<$curpage+$this->curpageStep && $i>$curpage-$this->curpageStep)$lista=true;
	    else $lista=false;
	  }
	  return $lista;
	}
	
	function curpageStep($step=6){
	 $this->curpageStep=$step;
	}
	function getStopPages($pages,$curpage){
	 if($curpage==$pages)$this->stopPages=$pages;
	 else if($this->maxPages!=$pages){
	    
		$this->stopPages=($this->maxPages>$curpage)?$this->maxPages:$curpage+floor($this->maxPages/2);
	
	 }
	 else $this->stopPages=$pages;
	 if($this->stopPages>$pages)$this->stopPages=$pages;
	 return $this->stopPages;
	 //$this->curpageValue=($i>$this->maxPages)?$this->maxPages+$i:$i;
	}
  } 

  class itemPager extends Pager   {
  	public  $nextItem;
	public  $curItem;
	public  $curItemIndex;
	public  $curParent;
	public  $prevItem;
	public  $curData;
	public  $nextUrl;
	public  $prevUrl;
	public  $nItem;
	private $arrayItems=array();
	
   public  function __construct($data,$item,$curParent) {
      
       $this->curData = $data;
	   $this->curItem = $item;
	   $this->curParent = $curParent;
   }
   
   public  function setPager() {
       $this->nItem=0;
       foreach ($this->curData as $d) {
       
       	if($this->curParent==$d->IdParent) {
       		 $this->nItem++;
       		
       		 array_push($this->arrayItems,$d);
			 if($this->curItem==$d->Id) $this->curItemIndex=$this->nItem;
			 
       	}
       }
	   if($this->nItem>0){
		     
			$this->nextItem=(int)$this->curItemIndex+1;
		    $this->prevItem=$this->curItemIndex-1;
		   
			if($this->curItemIndex==$this->nItem) {
				$this->nextItem=1;
		    }
			
		    if($this->curItemIndex==1) {
				$this->prevItem=$this->nItem;
		    }
			
	   }
	   
	   
      $this->arrayItems[$this->nextItem-1]->t =$this->arrayItems[$this->nextItem-1]-> Code ;
      $this->nextUrl= pathHndler($this->arrayItems[$this->nextItem-1]);
	  $this->arrayItems[$this->prevItem-1]->t =$this->arrayItems[$this->prevItem-1]-> Code ;
      $this->prevUrl= pathHndler($this->arrayItems[$this->prevItem-1]);

   }
       
    public  function getNextUrl() {
    	
		return $this->nextUrl;
      
   }
	
	 public  function getPrevtUrl() {
    	
		return $this->prevUrl;
      
   }
   function __destruct() {
       
   }
 
  }
?>