<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/expense.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $expense = new Expense($pdo);
    $expense->date = $_POST["date"];
    $expense->type_id = $_POST["type_id"];
    $expense->expense_specification = $_POST["expense_specification"];
    $expense->value = $_POST["value"];
    $expense->notes = $_POST["notes"];
    $saved = $expense->update($id);
    if ($saved) {
        echo "Expense was saved successfully";
    } else {
        echo "An error occurred while saving the expense";
    }
?>