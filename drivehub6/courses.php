<!--<?php 
// <?php
// include_once 'connection_db.php';
//// include 'p/_modal.php';
// include "boot.php";

session_start();

include_once 'connection_db.php';
include 'p/_modal.php';
include "boot.php";

// Query to get the admin name
$admin = "SELECT adminame FROM administrator";
$adminname = mysqli_query($conn, $admin);
$ar = mysqli_fetch_assoc($adminname);
$aname = $ar['adminame'];

$user = $_SESSION['username'];

// Array to store faculty names
$facultyNames = array();

// Query to get the faculty names
$query = "SELECT fname FROM faculty";
$result = mysqli_query($conn, $query);

if ($result) {
    // Loop through each row in the result
    while ($row = mysqli_fetch_assoc($result)) {
        // Add each faculty name to the array
        $facultyNames[] = $row['fname'];
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

$arrayLength = count($facultyNames);

for ($i = 0; $i < $arrayLength; $i++) {
    if ($facultyNames[$i] == $aname) {
        echo "go to faculty page ";
        echo '
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>Button Example</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    
 <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Drivehub</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Messages
                            </button>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <form action="logout.php" method="post">
            <!-- Bootstrap-styled logout button -->
            <button type="submit" name="logout" class="btn btn-danger  btn-block">Logout</button>
        </form>
        </nav>
        <div class="container mt-5">
            <form action="facultyh.php" method="get">
                <button type="submit" class="btn btn-primary">Go to Faculty Page</button>
            </form>
        </div>
    </body>
    </html>
      
        ';
        break;
    }
}
echo'

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Course</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 400px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .form-container h1 {
            margin-bottom: 20px;
        }
        .form-container button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

        
    <div class="container">
        <div class="form-container">
            <h1>Insert Course</h1>
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="course_name" class="form-label">Course Name:</label>
                    <input type="text" id="course_name" name="course_name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Insert Course</button>
            </form>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>';



















































// session_start();


// include_once 'connection_db.php';
// include 'p/_modal.php';
// include "boot.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get the course name from the form
//     $course_name = $_POST['course_name'];

//     // Insert the course name into the coursedetail table
//     $sql = "INSERT INTO coursedetails (course) VALUES (?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("s", $course_name);

//     if ($stmt->execute()) {
//         echo "New course inserted successfully";
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     // $stmt->close();
// }

// Query to get the admin name
// $admin = "SELECT adminame FROM administrator";
// $adminname = mysqli_query($conn, $admin);
// $ar = mysqli_fetch_assoc($adminname);
// $aname = $ar['adminame'];

// $user = $_SESSION['username'];

// // Array to store faculty names
// $facultyNames = array();

// Query to get the faculty names
// $query = "SELECT fname FROM faculty";
// $result = mysqli_query($conn, $query);

// if ($result) {
//     // Loop through each row in the result
//     while ($row = mysqli_fetch_assoc($result)) {
//         // Add each faculty name to the array
//         $facultyNames[] = $row['fname'];
//     }
// } else {
//     echo "Error: " . mysqli_error($conn);
// }

// Print the array for debugging (optional)
// print_r($facultyNames);
// $arrayLength = count($facultyNames);

// for ($i = 0; $i < $arrayLength; $i++) {
//     if ($facultyNames[$i] == $aname) {
//         echo "go to faculty page ";
//         echo '
    
//     <!DOCTYPE html>
//     <html>
//     <head>
//         <title>Button Example</title>
//     </head>
//     <body>
//         <form action="faculty.php" method="get">
//             <button type="submit">Go to Another Page</button>
//         </form>
//     </body>
//     </html>
      
//         ';
//         break;
//     }
// }




// echo '<!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Insert Course</title>
//     <style>
//         form {
//             margin: 40px auto;
//             padding: 20px;
//             border: 1px solid #ccc;
//             border-radius: 5px;
//             width: 300px;
//             text-align: center;
//         }
//         label {
//             display: block;
//             margin-bottom: 5px;
//         }
//         input[type="text"] {
//             width: 100%;
//             padding: 8px;
//             margin-bottom: 10px;
//             border: 1px solid #ccc;
//             border-radius: 4px;
//             box-sizing: border-box;
//         }
//         button[type="submit"] {
//             background-color: #4CAF50;
//             color: white;
//             padding: 10px 20px;
//             border: none;
//             border-radius: 4px;
//             cursor: pointer;
//         }
//         button[type="submit"]:hover {
//             background-color: #45a049;
//         }
//     </style>
// </head>
// <body>
//     <h1>Insert Course</h1>
//     <form action="index.php" method="post">
//         <label for="course_name">Course Name:</label>
//         <input type="text" id="course_name" name="course_name" required>
//         <button type="submit">Insert Course</button>
//     </form>
// </body>
// </html>
// ';




?> 
