<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/breed/breed.php';
    
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $breed = new CattleBreed($pdo);
    $breed->name = $_POST["name"];
    $breed->description = $_POST["description"];
    $breed->image = $_POST["image"];
    $breed->milk_production = $_POST["milk_production"];
    $breed->meat_production = $_POST["meat_production"];
    $breed->adaptability = $_POST["adaptability"];
    $breed->comments = $_POST["comments"];
    $saved = $breed->create();
    if ($saved) {
        echo json_encode($breed);
    } else {
        echo "An error occurred while saving the cattle";
    }
?>