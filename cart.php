<?php
session_start();
include "db.php";

/* Check login */
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

/* Create cart if it doesn't exist */
if (!isset($_SESSION["cart"])) 
{
    $_SESSION["cart"] = [];
}

/* Add product to cart */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_id = intval($_POST["product_id"]);

    if (isset($_SESSION["cart"][$product_id])) {

        $_SESSION["cart"][$product_id]++;

    } else {

        $_SESSION["cart"][$product_id] = 1;

    }

}


/* Calculate total */
$subtotal = 0;
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Paper & Petals - Cart</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header class="navbar">

    <div class="logo">
        Paper & Petals 🌷
    </div>

    <div class="nav-links">

        <a href="home.php">Home</a>

        <a href="cart.php">Cart 🛒</a>

        <a href="logout.php">Logout</a>

    </div>

</header>

<div class="cart-container">

    <h1>Your Cart ♡</h1>

    <?php

    if (empty($_SESSION["cart"])) {

        echo "<p>Your cart is empty.</p>";

        echo '<p><a href="home.php">Continue Shopping</a></p>';

    } else {

        foreach ($_SESSION["cart"] as $product_id => $quantity) {


            $sql = "SELECT * FROM products WHERE id = $product_id";

            $result = mysqli_query($conn, $sql);

            $product = mysqli_fetch_assoc($result);


            $item_total = $product["price"] * $quantity;

            $subtotal = $subtotal + $item_total;

    ?>


            <div class="cart-item">


                <div>

                    <h3>
                        <?php echo $product["name"]; ?>
                    </h3>

                    <p>
                        ₹<?php echo $product["price"]; ?> ×
                        <?php echo $quantity; ?>
                    </p>

                </div>


                <strong>

                    ₹<?php echo $item_total; ?>

                </strong>


            </div>


    <?php

        }


        $gst = $subtotal * 0.05;

        $total = $subtotal + $gst;

    ?>


        <div class="cart-total">

            <p>
                Subtotal:
                ₹<?php echo number_format($subtotal, 2); ?>
            </p>

            <p>
                GST (5%):
                ₹<?php echo number_format($gst, 2); ?>
            </p>

            <h2>
                Total:
                ₹<?php echo number_format($total, 2); ?>
            </h2>


            <a href="home.php" class="cart-button">
                Continue Shopping
            </a>


            <a href="checkout.php" class="cart-button">
                Checkout →
            </a>

        </div>


    <?php } ?>


</div>


</body>

</html>