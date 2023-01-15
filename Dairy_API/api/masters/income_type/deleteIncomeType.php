<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/income_type/income_type.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $income_type = new IncomeType($pdo);
    $income_type->id = $id;
    $deleted = $income_type->delete();
    if ($deleted) {
        echo "income type was deleted successfully";
    } else {
        echo "An error occurred while deleting the income type";
    }
?>