

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
</body>
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
        
    </body>
</html>


<?php

session_start();
include_once 'connection_db.php';
// include 'p/_modal.php';
// include "boot.php";

echo "Add Faculty";

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Form with Button</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hide the form initially */
        #myForm, #batchForm {
            display: none;
            margin-top: 20px;
        }
    </style>
    <script>
        // Function to show the form
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function openBatchForm() {
            document.getElementById("batchForm").style.display = "block";
        }
    </script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Add Faculty</h1>
        <!-- Button to open the form -->
        <button onclick="openForm()" class="btn btn-primary mb-3">Open Form</button>

        <!-- The hidden form -->
        <div id="myForm" class="card p-4">
            <form action="faculty.php" method="post">
                <div class="mb-3">
                    <label for="userInput" class="form-label">Enter faculty name:</label>
                    <input type="text" id="userInput" name="userInput" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
';

if(isset($_POST['submit'])){
    $addfacultyname = $_POST['userInput'];

    $addfacultynamequery = "INSERT INTO `faculty`( `fname`) VALUES ('$addfacultyname')";
    $add = mysqli_query($conn, $addfacultynamequery);

    if($add){
        header("Location: facultyhe.php");
        exit(); // Important to prevent further script execution
    }
}

echo "Add Batch";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Batch</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hide the form initially */
        #batchForm {
            display: none;
            margin-top: 20px;
        }
    </style>
    <script>
        // Function to show the form
        function openBatchForm() {
            document.getElementById("batchForm").style.display = "block";
        }
    </script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Create New Batch</h1>
        <!-- Button to open the form -->
        <button onclick="openBatchForm()" class="btn btn-primary mb-3">Enter New Batch</button>

        <!-- The hidden form -->
        <div id="batchForm" class="card p-4">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="batchname" class="form-label">Batch Name:</label>
                    <input type="text" id="batchname" name="batchname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="coursename" class="form-label">Course Name:</label>
                    <input type="text" id="coursename" name="coursename" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Year:</label>
                    <input type="text" id="year" name="year" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="division" class="form-label">Division:</label>
                    <input type="text" id="division" name="division" class="form-control" required>
                </div>
                <button type="submit" name="batchsubmit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php

// PHP Code to process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['batchsubmit'])) {
    // Retrieve form data
    $batchname = $_POST['batchname'];
    $coursename = $_POST['coursename'];
    $year = $_POST['year'];
    $division = $_POST['division'];

    // Basic validation
    if (empty($batchname) || empty($coursename) || empty($year) || empty($division)) {
        echo "All fields are required.";
    } else {
        // Query to insert batch details into the database
        $addBatchQuery = "INSERT INTO `batchdetail` (`batchname`, `cource`, `year`, `division`) 
                          VALUES ('$batchname', '$coursename', '$year', '$division')";
        $result = mysqli_query($conn, $addBatchQuery);

        if($result){
            header("Location: facultyh.php");
            exit(); // Important to prevent further script execution
        }
    }
}

// Query to fetch data from the batch table
$query = "SELECT * FROM batchdetail";
$result = mysqli_query($conn, $query);

// Check if there are records in the result
if (mysqli_num_rows($result) > 0) {
    echo "<div class='container mt-5'>";
    echo "<h2 class='mb-4'>Batch Details</h2>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th>Batch Name</th>";
    echo "<th>Course Name</th>";
    echo "<th>Year</th>";
    echo "<th>Division</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "<th>Show</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Loop through the records and display them in table rows
    while ($record = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($record["batchname"]) . "</td>";
        echo "<td>" . htmlspecialchars($record["cource"]) . "</td>";
        echo "<td>" . htmlspecialchars($record["year"]) . "</td>";
        echo "<td>" . htmlspecialchars($record["division"]) . "</td>";
        echo "<td><a href='update.php?id=" . $record["bid"] . "' class='btn btn-warning btn-sm'>Update</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this record?');\" href='delete.php?id=" . $record["bid"] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
        echo "<td><a href='student.php?id=" . $record["bid"] . "' class='btn btn-info btn-sm'>Show</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "<div class='container mt-5'><p>No records found.</p></div>";
}

// Close the database connection
mysqli_close($conn);




?>
