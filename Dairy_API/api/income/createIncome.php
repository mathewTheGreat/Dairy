<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/income.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $income = new Income($pdo);
    $income->date = $_POST["date"];
    $income->type_id = $_POST["type_id"];
    $income->income_specification = $_POST["income_specification"];
    $income->value = $_POST["value"];
    $income->receipt_no = $_POST["receipt_no"];
    $income->notes = $_POST["notes"];
    $saved = $income->create();
    if ($saved) {
        echo "Income was saved successfully";
    } else {
        echo "An error occurred while saving the income";
    }
?>