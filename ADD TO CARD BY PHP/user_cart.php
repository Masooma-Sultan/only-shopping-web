<?php
session_start();
include('connect.php');

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || !isset($_SESSION['user_email'])) {
    echo "Please log in to view your cart.";
    exit;
}

// Retrieve user info from session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// Fetch cart items for the logged-in user
$cart_query = $con->prepare("SELECT cart.quantity, products.p_name, products.p_price, products.p_image 
                             FROM cart 
                             INNER JOIN products ON cart.id = products.id 
                             WHERE cart.user_id = ?");
$cart_query->bind_param("i", $user_id);
$cart_query->execute();
$cart_result = $cart_query->get_result();

// HTML for Cart Page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            padding: 20px;
            background-color: #003366;
            color: white;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #003366;
            color: white;
        }
        img {
            width: 50px;
            height: 50px;
        }
        .total-row {
            font-weight: bold;
            text-align: right;
        }
        .checkout-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
        }
        .checkout-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<h1>Your Shopping Cart</h1>

<?php
if ($cart_result && mysqli_num_rows($cart_result) > 0) {
    $grand_total = 0;
    echo '<table>';
    echo '<tr><th>Product</th><th>Image</th><th>Price</th><th>Quantity</th><th>Total</th></tr>';
    
    while ($item = mysqli_fetch_assoc($cart_result)) {
        $total_price = $item['p_price'] * $item['quantity'];
        $grand_total += $total_price;

        echo '<tr>';
        echo '<td>' . htmlspecialchars($item['p_name']) . '</td>';
        echo '<td><img src="images/' . htmlspecialchars($item['p_image']) . '" alt="' . htmlspecialchars($item['p_name']) . '"></td>';
        echo '<td>$' . number_format($item['p_price'], 2) . '</td>';
        echo '<td>' . $item['quantity'] . '</td>';
        echo '<td>$' . number_format($total_price, 2) . '</td>';
        echo '</tr>';
    }

    echo '<tr class="total-row">';
    echo '<td colspan="4">Grand Total:</td>';
    echo '<td>$' . number_format($grand_total, 2) . '</td>';
    echo '</tr>';
    echo '</table>';
    echo '<a href="user_checkout.php" class="checkout-btn">Proceed to Checkout</a>';
} else {
    echo "<h3>Your cart is empty.</h3>";
}
?>

</body>
</html>