<?php

session_start();

include "db.php";


/* Check login */

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit();

}


/* Check cart */

if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {

    header("Location: home.php");
    exit();

}


/* Calculate total */

$subtotal = 0;

$order_items = [];


foreach ($_SESSION["cart"] as $product_id => $quantity) {

    $product_id = intval($product_id);

    $sql = "SELECT * FROM products WHERE id = $product_id";

    $result = mysqli_query($conn, $sql);

    $product = mysqli_fetch_assoc($result);

    $item_total = $product["price"] * $quantity;

    $subtotal += $item_total;


    /* Save item name and quantity */

    $order_items[] = $product["name"] . " x " . $quantity;

}


$gst = $subtotal * 0.05;

$total = $subtotal + $gst;


/* Order placed */

$order_placed = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];

    $phone = $_POST["phone"];

    $address = $_POST["address"];


    /* Convert order items into one string */

    $items = implode(", ", $order_items);


    /* Insert order into MySQL */

    $sql = "INSERT INTO orders
            (user_id, customer_name, phone, address, items, total)
            VALUES
            (
                '{$_SESSION["user_id"]}',
                '$name',
                '$phone',
                '$address',
                '$items',
                '$total'
            )";


    if (mysqli_query($conn, $sql)) {

        $order_placed = true;

        /* Get the newly created order ID */

        $order_id = mysqli_insert_id($conn);


        /* Clear cart */

        $_SESSION["cart"] = [];

    }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Paper & Petals - Checkout</title>

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



<div class="checkout-container">


<?php if ($order_placed) { ?>


    <div style="text-align: center;">

        <h1>
            Order Placed! 🌷
        </h1>


        <p>
            Thank you for shopping with
            Paper & Petals,
            <?php echo $_SESSION["name"]; ?>!
        </p>


        <p>
            Your Order ID is:
            <strong>#<?php echo $order_id; ?></strong>
        </p>


        <p>
            Your stationery is on its way. ♡
        </p>


        <br>


        <a href="home.php" class="cart-button">
            Continue Shopping
        </a>

    </div>


<?php } else { ?>


    <h1>
        Checkout ♡
    </h1>


    <h2>
        Delivery Details
    </h2>


    <form method="POST">


        <label>
            Full Name
        </label>

        <input
            type="text"
            name="name"
            value="<?php echo $_SESSION["name"]; ?>"
            required
        >


        <label>
            Phone Number
        </label>

        <input
            type="tel"
            name="phone"
            required
        >


        <label>
            Delivery Address
        </label>

        <textarea
            name="address"
            required
        ></textarea>


        <h2>
            Order Total:
            ₹<?php echo number_format($total, 2); ?>
        </h2>


        <button type="submit">
            Place Order 🌷
        </button>


    </form>


<?php } ?>


</div>


</body>

</html>