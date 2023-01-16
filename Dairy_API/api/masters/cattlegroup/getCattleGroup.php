<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/cattlegroup/cattlegroup.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $cattle_group = new CattleGroup($pdo);
    $data = $cattle_group->find($id);
    
    if($data) {
        http_response_code(200);
        echo json_encode($cattle_group);
    }else {
        http_response_code(400);
        echo "No cattle group found matching the supplied id";
    }
?>