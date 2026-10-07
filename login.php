<?php
session_start();
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users
            WHERE email = '$email' AND password = '$password' ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] = $user["email"];

        header("Location: home.php");
        exit();
    }

    else {
        $message = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper & Petals - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">

    <h1>Paper & Petals 🌷</h1>
    <h2>Welcome Back ♡</h2>

    <?php
    if ($message != "") {
        echo "<p style='color:red;'>$message</p>";
    }
    ?>

    <form method="POST">

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

    </form>

    <p>
        Don't have an account?
        <a href="signup.php">Create Account</a>
    </p>

    </div>
</body>
</html>