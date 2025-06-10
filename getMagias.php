<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

include 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $stmt = $pdo->prepare("SELECT 
        id, 
        magicName, 
        school, 
        magicLevel, 
        components, 
        executionTime, 
        magicRange, 
        duration, 
        resistanceTest, 
        magicTesistance, 
        magicDescription, 
        imgPath 
    FROM magias");

    $stmt->execute();
    $magias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'data' => $magias,
        'message' => 'Magias carregadas com sucesso'
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage(),
        'message' => 'Erro ao carregar magias'
    ]);
}
?>