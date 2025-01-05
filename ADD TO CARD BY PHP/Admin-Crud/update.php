<?php
include("connect.php");

if (isset($_GET['msg'])) {
    $id = $_GET['msg'];

    // Fetch the product data for the given ID
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $product = mysqli_fetch_array($result);
    }
}

if (isset($_POST['update'])) {

    $name = $_POST['p_name'];
    $desc = $_POST['p_desc'];
    $price = $_POST['p_price'];
    $image = $_FILES['p_image']['name'];

    if ($image != "") {
        $imagePath = "images/" . $image;
        move_uploaded_file($_FILES['p_image']['tmp_name'], $imagePath);
        $sql = "UPDATE products SET p_name = '$name', p_desc = '$desc', p_price = '$price', p_image = '$image' WHERE id = $id";
    } else {
        // If no image is uploaded, keep the existing image
        $sql = "UPDATE products SET p_name = '$name', p_desc = '$desc', p_price = '$price' WHERE id = $id";
    }
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('Location: ../admin_display.php?UPDATED');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Roboto:wght@400;500&family=Georgia&display=swap" rel="stylesheet">
    <style>
       
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            min-height: 100vh;
        }

        .update-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .update-form h2 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
        }

        .update-form input, .update-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .update-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .update-form button:hover {
            background-color: #388e3c;
        }

        .btn-back {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 10;
        }
    </style>
</head>
<body>

    <button class="btn-back" onclick="window.location.href = 'index.php';">Back</button>

    <div class="update-form">
        <h2>Update Product</h2>
        <form action="update.php?msg=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="p_name" value="<?php echo $product['p_name']; ?>" placeholder="Product Name" required>
            <textarea name="p_desc" placeholder="Product Description" required><?php echo $product['p_desc']; ?></textarea>
            <input type="number" name="p_price" value="<?php echo $product['p_price']; ?>" placeholder="Product Price" required>
            <input type="file" name="p_image" accept="image/*">
            <button type="submit" name="update">Update Product</button>
        </form>
    </div>

</body>
</html>
