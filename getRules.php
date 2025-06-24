<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

$filename = 'regras.json';

if (file_exists($filename)) {
    $json = file_get_contents($filename);
    echo $json;
} else {
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'message' => 'Arquivo JSON não encontrado.'
    ]);
}
?>
