<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/api/masters/cattlegroup/cattlegroup.php';
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $cattlegroup = new CattleGroup($pdo);
    $cattlegroup->id = $id;
    $deleted = $cattlegroup->delete();
    if ($deleted) {
        echo "cattle group was deleted successfully";
    } else {
        echo "An error occurred while deleting the cattle group";
    }
?>