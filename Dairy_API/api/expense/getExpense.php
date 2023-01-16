<?php
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");

 include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
 include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/expense.php';
 
 $database = new DairyDatabase();
 $pdo = $database->getPDO();
 $expense = new Expense($pdo);
 $data = $expense->find($id);
 
 if($data) {
    http_response_code(200);
    echo json_encode($expense);
 }else {
    http_response_code(400);
    echo "No expense found matching the supplied id";
 }

?>