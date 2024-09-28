<?php
require_once "connection_db.php";
require_once "boot.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["user_input"];
    // Use mysqli_real_escape_string to sanitize the input
    $escaped_uname = mysqli_real_escape_string($conn, $uname);
    $query = "SELECT * FROM user WHERE MATCH(U_NAME) AGAINST('$escaped_uname')";
    
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($record = mysqli_fetch_assoc($result)) {
                echo '<div style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: rgba(255, 255, 255, 0.8);" class="alert alert-light text-center" role="alert">
                    <img src="p/image1.jpg" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;" alt="">
                    <a href="user_d_t.php?uname='.$record["U_NAME"].'" class="alert-link" style="text-decoration: none; color: #000;">' . $record["U_NAME"] . '</a>. Click to view Profile.
                    <a href="index.php" class="btn btn-link" style="color: black;">Back</a>
                </div>';
            }
        } else {
            echo '<div style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: rgba(255, 255, 255, 0.8);" class="alert alert-danger d-flex align-items-center" role="alert">
                    <img src="p/image1.jpg" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;" alt="">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div style="color: black;">
                        User not found;
                                <a href="index.php" class="btn btn-link" style="color: black;">Back</a>
                    </div>
                </div>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background: skyblue url('p/dimg.jpg') no-repeat;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0; /* Reset default margin */
        font-family: Arial, sans-serif; /* Set a default font */
    }
</style>
<body>
    
</body>
</html>
