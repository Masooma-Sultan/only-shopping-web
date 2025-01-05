<?php
include ('connect.php');
if(isset($_GET["msg"])){
    $id = $_GET["msg"];
    $sql = "SELECT * FROM register WHERE Id = $id";
    $result = mysqli_query($con, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        
        echo '
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    </head>
    <body>
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #1c1c1c;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: #333;
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            width: 280px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background: #444;
            color: #fff;
        }
        .form-container input[type="submit"] {
            background-color: purple;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #cc5200;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>UPDATE</h2>
        <form action="#" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="' . $row['name'] . '" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="' . $row['email'] . '" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="' . $row['password'] . '" required>
            
            <input type="submit" name="update" value="UPDATE DATA">
        </form>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>

';    }
}
?>
<?php 
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $id = $_GET["msg"];

    $myquery = mysqli_query($con, "UPDATE register SET name = '$name', email = '$email', password = '$pass' WHERE Id = $id");

    if ($myquery) {
        header("Location: fetch_adminpage.php");
    } else {
        echo "Not Done";
    }
}
?>
