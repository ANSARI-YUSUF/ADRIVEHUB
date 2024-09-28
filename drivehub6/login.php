<?php
include_once('connection_db.php');
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query to retrieve user by username
        $sql_select = "SELECT * FROM `User` WHERE `U_NAME`='$username'";
        $result = mysqli_query($conn, $sql_select);

        if (mysqli_num_rows($result) == 1) { // If user exists
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['PASSWORD'];

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $username; // Store username in session
                header('location:user_d.php'); // Redirect to user dashboard
                exit();
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid username or password
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid username or password
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: skyblue url('p/dimg.jpg') no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%; /* Full width */
            max-width: 600px; /* Max width for the container */
        }
        h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            color: white;
        }
        .btn-primary {
            background-color: #4CAF50; /* Green */
            border: none;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .btn-link {
            display: inline-block;
            background-color: black;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 4px;
            margin-top: 10px;
            padding: 10px 20px; /* Adjusted padding for better look */
        }
        .btn-link:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn-link">Back to Home</a>
    </form>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
