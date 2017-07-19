<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class zorro extends TagLibrary{


  
  function radio($name,$data,$pars) {
	
  	$fields = explode(".",$pars[text]);
  	
  	echo count($fields);
  	
  	foreach($data as $k => $v) {
  		$content .= "<input type=\"radio\" value=\"{$v[$pars[value]]}\">";
  		foreach($fields as $key => $value) {
  			$content .= " {$v[$value]}";
  		}
  	}
  	
  	return $content;
  }
  
  
  	  
}
