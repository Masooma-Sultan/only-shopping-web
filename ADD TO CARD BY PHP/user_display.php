<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Roboto:wght@400;500&family=Georgia&display=swap" rel="stylesheet">
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}

body {
    background-color: #f4f4f9;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding: 20px;
    min-height: 100vh;
    position: relative;
}

h1 {
    font-size: 36px;
    color: #333;
    text-align: center;
    font-family: 'Playfair Display', serif;
    margin-bottom: 20px;
}

.category-title {
    font-size: 24px;
    color: #4CAF50;
    margin-bottom: 30px;
    font-family: 'Roboto', sans-serif;
}

.product-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    max-width: 1000px;
    width: 100%;
    margin: 0 auto;
}

.product-box {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    position: relative;
}

.product-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

.product-box img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 15px;
    transition: transform 0.3s ease;
}

.product-box:hover img {
    transform: scale(1.05);
}

.product-name {
    font-size: 20px;
    font-family: 'Playfair Display', serif;
    color: #333;
    margin-top: 10px;
    font-weight: 600;
}

.product-desc {
    font-size: 16px;
    color: #555;
    margin: 8px 0;
    font-family: 'Georgia', serif;
    display: none;
    transition: opacity 0.3s ease;
    opacity: 0;
}

.product-box:hover .product-desc {
    display: block;
    opacity: 1;
}

.product-price {
    font-size: 18px;
    color: #e91e63;
    font-weight: bold;
    margin-bottom: 10px;
}

.btn-back {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    padding: 10px 18px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    margin-top: 20px;
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 10;
}

.btn-back:hover {
    background-color: #388e3c;
    transform: scale(1.05);
}

.btn-back:active {
    background-color: #2e7d32;
}
.cart {
    background-color: #ff4081; 
    color: white;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 5px;
    text-decoration: none;
    font-family: 'Roboto', sans-serif;
    text-align: center;
}

.cart:hover {
    background-color: #f50057; 
}


@media (max-width: 768px) {
    .product-container {
        grid-template-columns: 1fr;
    }
}
    </style>
</head>
<body>

    <u><h1>Welcome to Our Online Store</h1></u>
    <u><p class="category-title">Hair Care Products</p></u>

    <div class="product-container">
        <?php
        $fetch = mysqli_query($con, "SELECT * FROM products");
        while ($rec = mysqli_fetch_array($fetch)) {
            $imagePath = "images/" . $rec['p_image']; 
        ?>
            <div class="product-box">
                <img src="<?php echo $imagePath; ?>" alt="Image not uploaded">
                <h3 class="product-name"><?php echo $rec['p_name']; ?></h3>
                <p class="product-desc"><?php echo $rec['p_desc']; ?></p>
                <p class="product-price">$<?php echo $rec['p_price']; ?></p>
                <a href="user_cart.php?id=<?php echo $rec['id']; ?>" class="cart">Add to Cart</a>
            </div>
          
        <?php } ?>
    </div>

    <button class="btn-back" onclick="smart()">Back</button>

    <script>
        function smart() {
            window.location.href = "main_page/index.php";
        }
    </script>
</body>
</html>