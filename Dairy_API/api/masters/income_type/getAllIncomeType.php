<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/income_type/income_type.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $income_type = new IncomeType($pdo);
    $allIncomeTypes = $income_type->getAll();
    http_response_code(200);
    echo json_encode($allIncomeTypes);
?>