<?php 
 
 function get_backgroundlist(){
 	
	
	$filepath = "images/backgrounds";
	
	$files = scandir($filepath);
	
	$filelist = array();
	foreach($files as $filename){
		if(strcmp($filename, ".") && strcmp($filename, "..")){
			$filelist[] = $filepath."/".$filename;
			}
		}
	return $filelist;
	
 }
 
 function sap_pagination($itemList, $offset, $limit, $baseURL){
 	
 	//work out the pages number that are going to be required
 	$itemCount = count($itemList);
 	
 	//Work out the page count for the display
 	if($itemCount < $limit )
 	{
		$pageCount = 1;
	}
	elseif($itemCount == $limit){
		$pageCount = 1;
	}
	else{
		$pageCount = $itemCount / $limit;
		if($itemCount % $limit > 0 ){
			$pageCount++;
		}
	}
 	
 	$returnString = " < ";
 	for($count = 1; $count <= $pageCount; $count++)
 	{
		$returnString .= " ".$count." ";
	}
 	$returnString .= " > ";
 	
 	
 
 	
 	return $returnString;
 }
 
 ?> 