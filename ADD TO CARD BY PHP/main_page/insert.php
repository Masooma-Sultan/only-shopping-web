<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #e6f7ff; /* Light blue background */
        margin: 0;
        padding: 0;
    }

    .form-container {
        width: 300px;
        padding: 20px;
        background: linear-gradient(135deg, #69b3ff, #0056b3); /* Light to dark blue gradient */
        border-radius: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); /* Center the form */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        color: white;
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .form-container label {
        color: white;
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
    }

    .form-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: none;
        border-radius: 5px;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"] {
        background-color: #fff;
        color: #333;
        font-size: 16px;
    }

    .form-container input[type="submit"] {
        background-color: #fff;
        color: #69b3ff; /* Light blue for the submit button text */
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
    }

    .form-container input[type="submit"]:hover {
        background-color: #b3e0ff; /* Light blue hover color */
        color: white;
    }
</style>

    </style>
</head>
<body>

    <div class="form-container">
        <h2>Register</h2>
        <form action="#" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" name="submit" value="Register">
        </form>
       
    </div>

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

<?php
include('connect.php');

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "INSERT INTO `register`( `name`, `email`, `password`) VALUES ('$name','$email','$pass')";
$result = mysqli_query($con , $sql);

if($sql){
    echo"inserted";
}
else{
    echo"not connected";
}
if($result) {
    $_SESSION["registration_success"] = "REGISTERED"; 
    echo "<script>alert('REGISTERED');</script>"; 
    header("location: index.php"); 
    exit(); 
}

}
?>