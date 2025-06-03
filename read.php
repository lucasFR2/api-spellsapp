<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$dados = file_get_contents("dados.json");

echo $dados;
?>
