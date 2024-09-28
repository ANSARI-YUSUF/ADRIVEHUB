<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drivehub";
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    echo "not connected";
}


?>