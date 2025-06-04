<?php
require 'config.php';

try {
    $stmt = $pdo->prepare("SELECT 
        id, 
        name, 
        school, 
        level, 
        components, 
        execution_time, 
        range_value AS range, 
        duration, 
        resistance_test, 
        magic_resistance, 
        description, 
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
