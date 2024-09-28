<?php

session_start();
include_once 'connection_db.php';
include 'p/_modal.php';
include "boot.php";

// Check if 'id' is present in the query string
if (isset($_GET['id'])) {
    $batchId = $_GET['id'];
    $_SESSION['batchid'] = $batchId;
} elseif (isset($_SESSION['batchid'])) {
    $batchId = $_SESSION['batchid'];
} else {
    echo "No batch ID provided in the query string or session.";
    exit();
}

// Validate the batchId to prevent SQL injection
$batchId = mysqli_real_escape_string($conn, $batchId);

// Fetch batch details using the batchId
$query = "SELECT * FROM batchdetail WHERE bid = '$batchId'";
$result = mysqli_query($conn, $query);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Fetch the batch details
    $batch = mysqli_fetch_assoc($result);
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Batch Details</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
        <style>
            #studentForm {
                display: none;
                margin-top: 20px;
            }
        </style>
        <script>
            // Function to show the form
            function openStudentForm() {
                document.getElementById("studentForm").style.display = "block";
            }
        </script>
    </head>
    <body class="bg-light">

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
            <h2 class="mb-4">Batch Details</h2>
            <div class="card p-4">
                <p><strong>Batch Name:</strong> ' . htmlspecialchars($batch["batchname"]) . '</p>
                <p><strong>Course Name:</strong> ' . htmlspecialchars($batch["cource"]) . '</p>
                <p><strong>Year:</strong> ' . htmlspecialchars($batch["year"]) . '</p>
                <p><strong>Division:</strong> ' . htmlspecialchars($batch["division"]) . '</p>
            </div>
            <h2 class="mt-5">Add New Student</h2>
            <button onclick="openStudentForm()" class="btn btn-primary mb-3">Add Student</button>

            <!-- The hidden form -->
            <div id="studentForm" class="card p-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Student Name:</label>
                        <input type="text" id="studentName" name="studentName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentEmail" class="form-label">Student Email:</label>
                        <input type="email" id="studentEmail" name="studentEmail" class="form-control" required>
                    </div>
                    <button type="submit" name="studentSubmit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </body>
    </html>';

    // Store batch details in session variables
    $_SESSION['batchname'] = $batch['batchname'];
    $_SESSION['course'] = $batch['cource'];
} else {
    echo "No batch found with the given ID.";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['studentSubmit'])) {
    $studentName = $_POST['studentName'];
    $_SESSION['stuname'] = $studentName;
    $studentEmail = $_POST['studentEmail'];

    // Basic validation
    if (empty($studentName) || empty($studentEmail)) {
        echo "All fields are required.";
    } else {
        // Insert student details into the database
        $batchname = $_SESSION['batchname'];
        $course = $_SESSION['course'];

        $addStudentQuery = "INSERT INTO `student` (`stuname`, `email`, `bid`, `batchname`, `course`) 
                            VALUES ('$studentName', '$studentEmail', '$batchId', '$batchname', '$course')";
        $result = mysqli_query($conn, $addStudentQuery);

        if ($result) {
            echo "Student added successfully.";
            // Optionally, redirect to the same page to refresh the student list
            header("Location: student.php?id=$batchId");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Fetch students associated with the batchId (assuming the table name is correct)
if (isset($_SESSION['batchname'])) {
    $bname = $_SESSION['batchname'];
    $studentQuery = "SELECT * FROM student WHERE batchname = '$bname'";
    $studentResult = mysqli_query($conn, $studentQuery);

    if (mysqli_num_rows($studentResult) > 0) {
        echo '
        <div class="container mt-5">
            <h3>Students in this Batch:</h3>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Batch Name</th>
                        <th>Course</th>
                        <th>Show Files</th>
                    </tr>
                </thead>
                <tbody>';
        
        while ($student = mysqli_fetch_assoc($studentResult)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($student["stuname"]) . "</td>";
            echo "<td>" . htmlspecialchars($student["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($student["batchname"]) . "</td>";
            echo "<td>" . htmlspecialchars($student["course"]) . "</td>";
            echo "<td><a href='subjects.php?sid=" . $student["stuid"] . "' class='btn btn-info btn-sm'>Show</a></td>";
            echo "</tr>";
        }

        echo '
                </tbody>
            </table>
        </div>';
    } else {
        echo "<div class='container mt-5'><p>No students found for this batch.</p></div>";
    }
} else {
    echo "<div class='container mt-5'><p>Batch name not set in session.</p></div>";
}

// Close the database connection
mysqli_close($conn);

?>
