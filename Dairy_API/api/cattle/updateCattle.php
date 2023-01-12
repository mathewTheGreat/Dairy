<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Dairy/Dairy_API/class/cattle.php';
    
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $cattle = new Cattle($pdo);
    $cattle->breed = 1;
    $cattle->name = $_POST["name"];
    $cattle->tag_no = $_POST["tag_no"];
    $cattle->gender = $_POST["gender"];
    $cattle->weight = $_POST["weight"];
    $cattle->birth_date = $_POST["birth_date"];
    $cattle->arrival_date = $_POST["arrival_date"];
    $cattle->source = $_POST["source"];
    $cattle->mother_tag_no = $_POST["mother_tag_no"];
    $cattle->father_tag_no = $_POST["father_tag_no"];
    $cattle->notes = $_POST["notes"];
    $cattle->from_group = $_POST["from_group"];
    $cattle->source_method = $_POST["source_method"];
    $saved = $cattle->update($id);
    if ($saved) {
        echo "Cattle was updated successfully";
    } else {
        echo "An error occurred while updating the cattle";
    }
?>