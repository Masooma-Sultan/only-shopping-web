<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Add New Item</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .admin-dashboard {
            background-color: #ffffff;
            width: 400px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .admin-dashboard h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .admin-dashboard form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-group input[type="file"] {
            border: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #4caf50;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-submit {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #388e3c;
        }

        .btn-submit:active {
            background-color: #2e7d32;
        }

        .form-message {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
        }

        .success {
            color: #4caf50;
        }

        .error {
            color: #e53935;
        }
    </style>
</head>
<body>

    <div class="admin-dashboard">
        <h1>Add New Item</h1>
        <form action="add_items.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Item Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea id="desc" name="desc" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn-submit">Add Item</button>
            <button class="btn-submit" onclick="smart()">Back</button>
        </form>
    </div>

    <script>
        // Optional: Confirm the form submission
        document.querySelector('form').addEventListener('submit', function(event) {
            if (!confirm('Are you sure you want to add this item?')) {
                event.preventDefault();
            }
        });
        function smart(){
            window.location.href='index.php'
        }
    </script>

</body>
</html>
<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];

        $location = "images/";
        $savingPath = $location . $imageName;

        move_uploaded_file($imageTmpName, $savingPath);

        $sql = "INSERT INTO `products`(`p_name`, `p_desc`, `p_price`, `p_image`) VALUES ('$name','$desc','$price','$imageName')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "Inserted";
        } else {
            echo "Not done";
        }
    }
}
?>