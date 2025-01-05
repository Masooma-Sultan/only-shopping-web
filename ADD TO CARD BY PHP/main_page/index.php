<?php
session_start();
if (isset($_SESSION["user_name"])) {
    $name = $_SESSION["user_name"];
    echo "<h1>Welcome, " . $name . '</h1>';
}
if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true) { 
    echo '<a href="../index.php" class="login-btn">Admin Dashboard</a>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWU - Shop With Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        background-color: #f0fff4;
        color: #333;
    }

    header {
        background: #28a745;
        color: white;
        padding: 1.5em 0;
        position: relative;
        z-index: 1;
    }

    nav {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    nav ul {
        list-style-type: none;
        display: flex;
    }

    nav ul li {
        margin: 0 1.2em;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        padding: 0.6em 1.2em;
        font-size: 1.2em;
        border-radius: 8px;
    }

    nav ul li a:hover {
        background: #218838;
    }

    .button-box {
        position: absolute;
        top: 2em;
        right: 2em;
        background-color: #fff;
        padding: 1em;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 2;
    }

    .button-box a {
        display: block;
        margin-bottom: 0.5em;
    }

    .login-btn, .signup-btn {
        background: linear-gradient(45deg, #28a745, #007BFF);
        border-radius: 10px;
        padding: 0.6em 1.4em;
        font-size: 1.2em;
        color: white;
        text-decoration: none;
        transition: transform 0.3s ease, background 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .login-btn:hover, .signup-btn:hover {
        background: linear-gradient(45deg, #218838, #0056b3);
        transform: scale(1.05);
    }

    .below-btn-text {
        font-size: 0.9em;
        color: #333;
    }

    .content-wrapper {
        padding: 3em 2em;
        margin-top: 5em;
        text-align: center;
    }

    h1, h2 {
        font-size: 2.5em;
        color: #28a745;
    }

    p {
        max-width: 800px;
        margin: 0 auto;
        font-size: 1.1em;
    }

    .shop-now-btn {
        background-color: #007BFF;
        color: white;
        padding: 1em 2em;
        border-radius: 10px;
        font-size: 1.5em;
        margin-top: 2em;
        display: inline-block;
        text-decoration: none;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .shop-now-btn:hover {
        background-color: #0056b3;
        transform: scale(1.1);
    }

    .products-section ul {
        list-style: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .products-section ul li {
        width: 150px;
        margin: 1em;
        text-align: center;
    }

    @media (max-width: 768px) {
        nav ul {
            flex-direction: column;
            align-items: center;
        }

        nav ul li {
            margin: 0.8em 0;
        }

        .button-box {
            position: static;
            margin-top: 1em;
            display: block;
            text-align: center;
        }
    }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#products">Our Products</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>
        <div class="button-box">
            <a href="fetch_adminpage.php" class="login-btn">REGISTERED USERS</a>
            <a href="login.php" class="login-btn">Login</a>
            <div class="below-btn-text">Already have an account?</div>
            <a href="insert.php" class="signup-btn">Sign Up</a>
            <div class="below-btn-text">Create an account</div>
            <a href="logout.php" class="signup-btn">Log Out</a>
        </div>
    </header>

    <div class="content-wrapper">
        <section id="home">
            <h1>SWU - Shop With Us</h1>
            <p>Welcome to Shop With Us! We offer premium products from top sellers in the beauty industry, including hair masks, face washes, serums, and more. Shop with us and get the best for your hair and skin!</p>
        </section>

        <section id="products" class="products-section">
            <h2>Our Products</h2>
            <ul>
                <li>Hair Masks</li>
                <li>Face Washes</li>
                <li>Face Serums</li>
                <li>Hair Oils</li>
                <li>Face Creams</li>
            </ul>
            <a href="../user_display.php" class="shop-now-btn">Shop Now</a>
        </section>

        <section id="about">
            <h2>About Us</h2>
            <p>We bring the best beauty products to you, carefully sourced from the most reputable brands. Each product is tested and guaranteed to give you visible results. We are dedicated to providing high-quality items for your beauty routine!</p>
        </section>

        <section id="contact">
            <h2>Contact Us</h2>
            <p>If you have any questions, feel free to reach out to us!</p>
            <p>Email: <a href="mailto:support@beautystore.com">support@beautystore.com</a></p>
            <p>Phone: +123 456 7890</p>
            <p>Address: 123 Beauty Street, Glamour City, GC 12345</p>
            <p>Office Hours: Monday to Friday, 9:00 AM to 5:00 PM</p>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Beauty Store. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Document loaded and ready!");
        });
    </script>
</body>
</html>