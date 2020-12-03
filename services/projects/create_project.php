<?php
include "../../database/database.php";
$return = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    //receive JSON POST
    $json = file_get_contents('php://input');
    // Converts it into a PHP object
    $body = json_decode($json, true);

    $sql = "
    INSERT INTO `projects`(`project_name`, `project_start`, `project_end`) VALUES (
        '{$body["project_name"]}',
        '{$body["project_start"]}',
        '{$body["project_end"]}'
    )
    ";

    echo $sql;
} else {
    $return["status"] = "Method not allow";
}


header('Content-Type: application/json');
echo json_encode($return);
