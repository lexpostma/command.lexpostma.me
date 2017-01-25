<?php
require_once '../includes/connection.php';
include_once '../includes/functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['username'], $_POST['p'])) {
    $username = $_POST['username'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($username, $password, $mysqli) == true) {
        // Login success 
        header('Location: /home');
    } else {
        // Login failed 
        header('Location: /');
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: /');
}

?>