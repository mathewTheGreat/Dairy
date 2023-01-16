<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/farm.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $farm = new Farm($pdo);
    $farm->farm_name = $_POST["farm_name"];
    $farm->location = $_POST["location"];
    $farm->size = $_POST["size"];
    $farm->contact_person = $_POST["contact_person"];
    $farm->contact_number = $_POST["contact_number"];
    $farm->email = $_POST["email"];
    $saved = $farm->create();
    if ($saved) {
        echo "Farm was saved successfully";
    } else {
        echo "An error occurred while saving the farm";
    }
?>