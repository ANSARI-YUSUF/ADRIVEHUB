<?php
include_once('connection_db.php');

$errors = []; // Array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        $errors[] = "All fields are required!";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        // Check if username or email already exists
        $sql_check = "SELECT * FROM `user` WHERE `U_NAME`='$username' OR `U_EMAIL`='$email'";
        $result_check = mysqli_query($conn, $sql_check);
        
        if (mysqli_num_rows($result_check) > 0) {
            $errors[] = "Username or email already exists!";
        } else {
            // Insert new user record with hashed password
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql_insert = "INSERT INTO `user` (`U_NAME`, `U_EMAIL`, `PASSWORD`) VALUES ('$username', '$email', '$password')";
            $result_insert = mysqli_query($conn, $sql_insert);
            
            if ($result_insert) {
                header('Location: index.php');
                exit; // Stop further execution after redirection
            } else {
                $errors[] = "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://smtpjs.com/v3/smtp.js"></script>
  <style>
    body {
      background: skyblue url('p/dimg.jpg') no-repeat;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .container {
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      width: 100%;
      margin: 20px;
    }
    h2 {
      color: white;
      text-align: center;
      margin-bottom: 20px;
    }
    .form-label {
      color: white;
    }
    .btn-primary, .btn-secondary, .btn-link {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
    }
    .btn-primary {
      background-color: #4CAF50; /* Green */
      border: none;
    }
    .btn-primary:hover {
      background-color: #45a049;
    }
    .btn-secondary {
      margin-top: 10px;
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
    .alert {
      margin-bottom: 20px;
    }
    .otpverify {
      margin-top: 10px;
      display: none;
      flex-direction: column;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Sign Up</h2>
  
  <?php 
  if (!empty($errors)) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
      foreach ($errors as $error) {
          echo '<p>' . $error . '</p>';
      }
      echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
  }
  ?>
  
  <form method="POST">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
      <!-- <div class="otpverify">
          <input type="text" id="otp_inp" placeholder="Enter the OTP sent to your Email..." class="form-control my-2">
          <button type="button" class="btn btn-primary" id="otp-btn">Verify</button>
      </div>
      <button type="button" class="btn btn-secondary">Send OTP</button>
    </div> -->
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="index.php" class="btn-link">Back to Home</a>
  </form>
</div>

<!-- Bootstrap JS (optional)
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
let otp_val;

function sendOTP() {
    const email = document.getElementById('email').value;
    const otpverify = document.getElementsByClassName('otpverify')[0];
    
    otp_val = Math.floor(Math.random() * 10000).toString().padStart(4, '0'); // Ensure OTP is 4 digits
    const emailbody = `<h2>Your OTP is ${otp_val}</h2>`;
    
    Email.send({
        SecureToken: "9d69166e-6938-4ab8-aa92-08366c9582d9",
        To: email,
        From: "patoliyadrashti08@gmail.com",
        Subject: "Email OTP using JavaScript",
        Body: emailbody,
    }).then(message => {
        if (message === "OK") {
            alert("OTP sent to your Email " + email);
            otpverify.style.display = "flex";
        } else {
            alert("Failed to send OTP. Please try again.");
        }
    });
}

document.getElementById('otp-btn').addEventListener('click', () => {
    const otp_inp = document.getElementById('otp_inp').value;
    if (otp_inp === otp_val) {
        alert("Email address verified.");
    } else {
        alert("Invalid OTP.");
    }
});
</script> -->
</body>
</html>
