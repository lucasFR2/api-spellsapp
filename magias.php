<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

//le o arquivo JSON
$dados = file_get_contents("magias.json");

//retorna o json para quem fizer a requisição
echo $dados;
?>
