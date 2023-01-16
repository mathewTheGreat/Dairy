<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/income.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    $income = new Income($pdo);
    $deleted = $income->delete($id);
    if ($deleted) {
        echo "Income was deleted successfully";
    } else {
        echo "An error occurred while deleting the income";
    }
?>