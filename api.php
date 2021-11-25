<?php
header("Content-Type:application/json");

include("index.php");

print_r($final);

function response(){
	$response = $final;
	$json_response = json_encode($response);
	echo $json_response;
}
?>