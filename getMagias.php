<?php
include 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


try {
    $stmt = $pdo->prepare("SELECT 
        id, 
        magic_name, 
        school, 
        magic_level, 
        components, 
        execution_time, 
        magic_range, 
        duration, 
        resistance_test, 
        magic_resistance, 
        magic_description, 
        img_path 
    FROM magias");

    $stmt->execute();
    $magias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($magias);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}
?>
