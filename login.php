<?php
include "query.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = new Query();
    $authenticated = $query->login($username, $password);

    if ($authenticated) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: main_panel.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }
}
?>
