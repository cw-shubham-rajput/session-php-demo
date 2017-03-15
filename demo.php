<?php

/**
 * @author Shubham Rajput
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();

if (isset($_POST['email'])) {

    // receiving the post params
    $email = $_POST['email'];
    echo "Hello " . $email;

} else {
    // required post params is missing
    $response["status"] = 5;
    $response["message"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>

