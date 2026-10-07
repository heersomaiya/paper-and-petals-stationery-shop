<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper & Petals - Home</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

<!-- =========================
     NAVIGATION
========================= -->

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

<!-- =========================
     MAIN HOME
========================= -->

<div class="home">
    <!-- WELCOME -->

    <section class="welcome">

        <p class="small-text">
            A little stationery corner ♡
        </p>

        <h1>
            Hi, <?php echo $_SESSION["name"]; ?>!
        </h1>

        <p>
            Find something pretty for your desk today.
        </p>

    </section>

    <!-- PRODUCTS -->

    <section class="products-section">

        <h2>
            Our Stationery
        </h2>


        <!-- PRODUCT GRID -->

        <div class="product-grid">


            <?php while ($product = mysqli_fetch_assoc($result)) { ?>


                <!-- PRODUCT CARD -->

                <div class="product-card">


                    <!-- IMAGE -->

                    <img
                        src="images/<?php echo $product['image']; ?>"
                        alt="<?php echo $product['name']; ?>"
                    >

                    <!-- PRODUCT INFORMATION -->

                    <div class="product-info">

                        <p class="category">
                            <?php echo $product['category']; ?>
                        </p>

                        <h3>
                            <?php echo $product['name']; ?>
                        </h3>

                        <p class="description">
                            <?php echo $product['description']; ?>
                        </p>

                        <!-- PRICE + BUTTON -->

                        <div class="product-bottom">

                            <span class="price">

                                ₹<?php echo $product['price']; ?>

                            </span>


                            <form action="cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                
                                <button type="submit">
                                    Add to Cart
                                </button>
                            </form>

                        </div>


                    </div>


                </div>


            <?php } ?>


        </div>


    </section>


</div>


</body>

</html>