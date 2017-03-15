<?php

/**
 * @author Shubham Rajput
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

    // receiving the post params
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check if user is already existed with the same email
    if ($db->isUserExisted($email)) {
        // user already existed
        $response["status"] = 3;
        $response["message"] = "User already exists with " . $email;
        echo json_encode($response);
    } else {
        // create a new user
        $user = $db->storeUser($name, $email, $password);
        if ($user) {
            // user stored successfully
            $response["status"] = 1;
            $response["message"] = "User is registered";
            echo json_encode($response);
        } else {
            // user failed to store
            $response["status"] = 2;
            $response["message"] = "Error occurred in registration! Please register again.";
            echo json_encode($response);
        }
    }
} else {
    $response["status"] = 5;
    $response["message"] = "Required parameters (name, email or password) is missing!";
    echo json_encode($response);
}
?>

