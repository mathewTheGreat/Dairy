<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/milk_production.php';

    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $milk_production = new MilkProduction($pdo);
    $milk_production->cattle_ID = $_POST["cattle_ID"];
    $milk_production->date = $_POST["date"];
    $milk_production->morning_quantity = $_POST["morning_quantity"];
    $milk_production->afternoon_quantity = $_POST["afternoon_quantity"];
    $milk_production->evening_quantity = $_POST["evening_quantity"];
    $milk_production->quality = $_POST["quality"];
    $milk_production->milk_consumed_by_calf = $_POST["milk_consumed_by_calf"];
    $saved = $milk_production->create();
    if ($saved) {
        echo "Milk production was saved successfully";
    } else {
        echo "An error occurred while saving the milk production";
    }
?>