<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/milk_production.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    $milk_production = new MilkProduction($pdo);
    
    $allMilkProduction = $milk_production->getAll();
    http_response_code(200);
    echo json_encode($allMilkProduction);
?>