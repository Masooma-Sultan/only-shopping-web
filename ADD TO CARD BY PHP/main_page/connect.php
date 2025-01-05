<?php
$con = mysqli_connect("localhost","root","","2312d");
if($con){
    echo"connected";
}
else{
    echo"not connected";
}
?>