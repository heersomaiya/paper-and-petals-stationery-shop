<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password') ";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Account created successfully! You can now login.";
    }
    else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper & Petals - Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">

    <h1>Paper & Petals 🌷</h1>
    <h2>Create an Account</h2>

    <p>Your little stationery corner ♡</p>

    <?php
    if ($message != "") {
        echo "<p>$message</p>";
    }
    ?>

    <form method="POST">

        <label>Full Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Create Account</button>

    </form>

    <p>
        Already have an account?
        <a href="login.php">Login</a>
    </p>

    </div>
</body>
</html>