<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/expense_type/expense_type.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $expense_type = new ExpenseType($pdo);
    $expense_type->expense_name = $_POST["expense_name"];
    $saved = $expense_type->create();
    if ($saved) {
        echo json_encode($expense_type);
    } else {
        echo "An error occurred while saving the expense type";
    }
?>
