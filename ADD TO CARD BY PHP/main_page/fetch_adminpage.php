<!-- Back button to return to the previous page -->
<button onclick="smart()" style="background-color: green; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
    Return 
</button>
<script>
    function smart() {
        window.location.href='index.php';
    }
</script>
<!-- Back button -->

<?php
include('connect.php');
session_start();
if(isset($_SESSION["name"])){
    $name = $_SESSION["name"];
    $sql = "SELECT * FROM register WHERE name = '$name'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}
 if($row["user_role"]!=1){
    echo "YOU ARE PROHIBITED TO VISIT THIS PAGE";
    exit();
 }   
 echo '<h1>'.$_SESSION["name"].'</h1>';

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Fetched Records</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
        body {
    background-color: #000;
    color: #fff;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    text-align: center;
    max-width: 800px;
    margin: auto;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.8);
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

h2 {
    margin-bottom: 20px;
    font-size: 2rem;
    color: #ffcc00;
}

table {
    background-color: #000033;
    color: #fff;
    border-radius: 10px;
    overflow: hidden;
    margin: 0 auto;
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 15px;
    text-align: center;
}

th {
    background-color: #000066;
    color: #ffcc00;
}

.btn-danger, .btn-warning {
    color: white;
}

.btn-danger {
    background-color: #d9534f;
}

.btn-danger:hover {
    background-color: #c9302c;
}

.btn-warning {
    background-color: #f0ad4e;
}

.btn-warning:hover {
    background-color: #ec971f;
}

        </style>
    </head>

    <body>
        <div class="container mt-5">
            <h2>Records</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                
                    $fetch = mysqli_query($con, "select * from register");
                    while($rec = mysqli_fetch_array($fetch)) {
                    ?>
                    <tr>
                        <td><?php echo $rec['id']?></td>
                        <td><?php echo $rec['name']?></td>
                        <td><?php echo $rec['email']?></td>
                        <td><?php echo $rec['password']?></td>
                        <td>
                            <a href="delete.php?msg=<?php echo $rec['id']; ?>" class="btn btn-danger">Delete</a>
                            <a href="update.php?msg=<?php echo $rec['id']; ?>" class="btn btn-warning">Update</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
           
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