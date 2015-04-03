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
 
 
 
 ?> 