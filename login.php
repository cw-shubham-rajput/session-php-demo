<?php

/**
 * @author Shubham Rajput
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();

if (isset($_POST['email']) && isset($_POST['password'])) {

    // receiving the post params
    $email = $_POST['email'];
    $password = $_POST['password'];

    // get the user by email and password
    $user = $db->getUserByEmailAndPassword($email, $password);

    if ($user != false) {
        // use is found
        $response["status"] = 1;
        $response["message"] = "User is loged in!";

        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["status"] = 3;
        $response["message"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["status"] = 5;
    $response["message"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>

