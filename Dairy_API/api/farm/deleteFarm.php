<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/farm.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    $farm = new Farm($pdo);
    $deleted = $farm->delete($id);
    if ($deleted) {
        echo "Farm was deleted successfully";
    } else {
        echo "An error occurred while deleting the farm";
    }
?>