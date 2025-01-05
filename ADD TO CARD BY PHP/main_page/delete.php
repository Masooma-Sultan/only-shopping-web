<?php
include('connect.php');
if(isset($_GET["msg"])){
    $id = $_GET["msg"];
    $sql = "DELETE FROM register where Id = $id";
    $result = mysqli_query($con, $sql);
    if($result){
        header('location: fetch.php?DELETED ');

    }
}
?>