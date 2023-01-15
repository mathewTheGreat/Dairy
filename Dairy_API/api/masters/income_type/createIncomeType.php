<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/income_type/income_type.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $income_type = new IncomeType($pdo);
    $income_type->name = $_POST["income_name"];
    $saved = $income_type->create();
    if ($saved) {
        echo json_encode($income_type);
    } else {
        echo "An error occurred while saving the income type";
    }
?>
