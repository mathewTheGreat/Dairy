<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/class/cattle.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();

    $cattle = new Cattle($pdo);
    $deleted = $cattle->delete($id);
    if ($deleted) {
        echo "Cattle was deleted successfully";
    } else {
        echo "An error occurred while deleting the cattle";
    }
?>