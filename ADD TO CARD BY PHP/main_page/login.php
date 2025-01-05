<?php
session_start();
include ('connect.php');
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM register WHERE email = '$email' AND password = '$pass'"; 
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);

    if ($num) {
        $_SESSION["success"] = "LOGIN SUCCESSFUL";
        $row = mysqli_fetch_assoc($result);
        $_SESSION["user_name"] = $row["name"];  // Set user name in session
        $_SESSION["user_email"] = $row["email"];  // Set user email in session
        $_SESSION["user_id"] = $row["id"];  // Set user id in session
        
        if ($row["user_role"] == 0) {
            header("location: index.php"); 
        } else {
            $_SESSION["admin_logged_in"] = true; 
            header("location: index.php"); 
        }
    } else {
        echo "<script>alert('INVALID CREDENTIALS')</script>"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6e6fa; /* Lilac background */
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-btn {
            background-color: #9370db; /* Medium purple */
            border: none;
        }
        .login-btn:hover {
            background-color: #7a68b8; /* Darker purple on hover */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Enter Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Enter Your Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button name="login" type="submit" class="btn login-btn w-100">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
