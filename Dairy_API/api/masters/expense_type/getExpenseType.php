<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/expense_type/expense_type.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $expense_type = new ExpenseType($pdo);
    $data = $expense_type->find($id);
    
    if($data) {
        http_response_code(200);
        echo json_encode($expense_type);
    }else {
        http_response_code(400);
        echo "No expense type found matching the supplied id";
    }