<?php

/* PHP FUNCTIONS */

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysql_real_escape_string($data);
  return $data;
}


function price($data){
	if(preg_match("/^[0-9,]+$/", $data)){
		$data = str_replace(",", "", $data);
	}
}

?>