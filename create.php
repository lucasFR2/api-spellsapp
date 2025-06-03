<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

//recebe dados do app
$data = json_decode(file_get_contents("php://input"), true);

//lê o arquivo atual
$arquivo = "dados.json";
$dados = json_decode(file_get_contents($arquivo), true);

//gera ID novo
$ultimo = end($dados);
$novoId = $ultimo ? $ultimo["id"] + 1 : 1;

//cria novo item
$novoItem = [
    "id" => $novoId,
    "nome" => $data["nome"],
    "descricao" => $data["descricao"]
];

//adiciona ao array
$dados[] = $novoItem;

//salva no JSON
file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));

//retorna sucesso
echo json_encode(["message" => "Item adicionado com sucesso", "item" => $novoItem]);
?>
