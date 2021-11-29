<?php
header("Content-Type:application/json");

include("index.php");

$vetFinal = getNumbers();

$vetOrdenado = transform($vetFinal);

function response($vetFinal){
	$json_response = json_encode($vetFinal);
	echo ($json_response);
}

response($vetOrdenado);
?>