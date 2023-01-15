<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/cattlegroup/cattlegroup.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $cattlegroup = new CattleGroup($pdo);
    $cattlegroup->name = $_POST["name"];
    $cattlegroup->description = $_POST["description"];
    $cattlegroup->cattle_count = $_POST["cattle_count"];
    $cattlegroup->type = $_POST["type"];
    $cattlegroup->feeding_schedule = $_POST["feeding_schedule"];
    $cattlegroup->comments = $_POST["comments"];
    $cattlegroup->movement = $_POST["movement"];
    $cattlegroup->movement_date = $_POST["movement_date"];
    $cattlegroup->movement_location = $_POST["movement_location"];
    $cattlegroup->employee_id = $_POST["employee_id"];
    $cattlegroup->farm_id = $_POST["farm_id"];
    $cattlegroup->health_status = $_POST["health_status"];
    $cattlegroup->vaccination_date = $_POST["vaccination_date"];
    $cattlegroup->medication = $_POST["medication"];
    $cattlegroup->milk_production = $_POST["milk_production"];
    $cattlegroup->milk_quality = $_POST["milk_quality"];
    $saved = $cattlegroup->update();
    if ($saved) {
        http_response_code(200);
        echo json_encode($breed);
    } else {
        http_response_code(400);
        echo "An error occurred while updating the breed";
    }
?>