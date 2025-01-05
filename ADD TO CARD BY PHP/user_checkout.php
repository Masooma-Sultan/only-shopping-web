<?php
session_start();
include("connect.php");

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || !isset($_SESSION['user_email'])) {
    echo "Please log in to proceed with the checkout.";
    exit;
}

// Retrieve user info from session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// Fetch cart items for the logged-in user
$cart_query = $con->prepare("SELECT * FROM cart WHERE user_id = ?");
$cart_query->bind_param("i", $user_id);
$cart_query->execute();
$cart_result = $cart_query->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
        }
        .checkout-container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .checkout-title {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 20px;
            text-align: center;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .cart-item p {
            margin: 0;
            font-size: 16px;
        }
        .total-price {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            text-align: right;
        }
        .btn-place-order {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }
        .btn-place-order:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="checkout-container">
        <h2 class="checkout-title">Your Cart</h2>

        <?php
        $total_price = 0;
        while ($cart_item = mysqli_fetch_array($cart_result)) {
            // Fetch product details from the products table
            $product_query = $con->prepare("SELECT * FROM products WHERE id = ?");
            $product_query->bind_param("i", $cart_item['id']);
            $product_query->execute();
            $product_result = $product_query->get_result();
            $product = mysqli_fetch_array($product_result);
            
            // Calculate total price for each item
            $total_item_price = $product['p_price'] * $cart_item['quantity'];
            $total_price += $total_item_price;
        ?>
            <div class="cart-item">
                <p><?php echo htmlspecialchars($product['p_name']); ?> x <?php echo $cart_item['quantity']; ?></p>
                <p>$<?php echo number_format($total_item_price, 2); ?></p>
            </div>
        <?php } ?>

        <div class="total-price">
            Total: $<?php echo number_format($total_price, 2); ?>
        </div>

        <button class="btn-place-order" onclick="placeOrder()">Place Order</button>
    </div>

    <script>
        function placeOrder() {
            alert("Your order is completed. You will soon receive an email about shipping.");
            window.location.href = "main_page/index.php"; // Redirect to homepage or another page after order
        }
    </script>

</body>
</html>
