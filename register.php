<?php
session_start();

if (isset($_POST['register'])) {
    require_once 'query.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = new Query();
    $result = $query->register($username, $email, $password);

    if ($result) {
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "<script>alert('Registration failed!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>
