<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/breed/breed.php';
    
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $breed = new CattleBreed($pdo);
    $data = $breed->find($id);
    
    if($data) {
        http_response_code(200);
        echo json_encode($breed);
    }else {
        http_response_code(400);
        echo "No breed found matching the supplied id";
    }

 
?>