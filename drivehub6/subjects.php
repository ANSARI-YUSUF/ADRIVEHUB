<?php

session_start();
include_once 'connection_db.php';
include 'p/_modal.php';
include "boot.php";

// Check if 'id' is present in the query string
if (isset($_GET['sid'])) {
    $studentid = $_GET['sid'];
    $_SESSION['studentid'] = $studentid;
} elseif (isset($_SESSION['studentid'])) {
    $studentId = $_SESSION['studentid'];
} else {
    echo "No batch ID provided in the query string or session.";
    exit();
}

$batchname = $_SESSION['batchname'];
$course = $_SESSION['course'];
$studentId = $_SESSION['studentid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the subject details from the form
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $credits = $_POST['credits'];

    // Insert the subject details into the subject table
    $sql = "INSERT INTO subjectsdetail (subjects, subjectcode, credit, batchname, course) VALUES ('$subject_name', '$subject_code', '$credits', '$batchname','$course')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Subject added successfully.";
        // Optionally, redirect to the same page to refresh the student list
        header("Location: subjects.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch data from subjectsdetail table
$subjects = [];
$sql2 = "SELECT * FROM subjectsdetail";
$result = mysqli_query($conn, $sql2);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $subjects[] = $row;
    }
} else {
    echo "Error fetching subjects: " . mysqli_error($conn);
}

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
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
        <h2 class="mb-4">Subjects List</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>Credits</th>
                    <th>Batch Name</th>
                    <th>Course</th>
                    <th>Show Files</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($subjects as $subject) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($subject['subid']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['subjects']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['subjectcode']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['credit']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['batchname']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['course']) . '</td>';
                    echo "<td><a href='subjectfiles.php?subid=" . $subject["subid"] . "' class='btn btn-info btn-sm'>Show</a></td>";
                    echo '</tr>';
                }
echo '
            </tbody>
        </table>

        <h1 class="mt-5">Insert Subject</h1>
        <form action="subjects.php" method="post" class="card p-4 mt-3">
            <div class="mb-3">
                <label for="subject_name" class="form-label">Subject Name:</label>
                <input type="text" id="subject_name" name="subject_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="subject_code" class="form-label">Subject Code:</label>
                <input type="text" id="subject_code" name="subject_code" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="credits" class="form-label">Credits:</label>
                <input type="number" id="credits" name="credits" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Insert Subject</button>
        </form>
    </div>
</body>
</html>';
?>

<?php

// session_start();
include_once 'connection_db.php';
include 'p/_modal.php';
include "boot.php";

// Check if 'id' is present in the query string
if (isset($_GET['sid'])) {
    $studentid = $_GET['sid'];
    $_SESSION['studentid'] = $studentid;
} elseif (isset($_SESSION['studentid'])) {
    $studentId = $_SESSION['studentid'];
} else {
    echo "No batch ID provided in the query string or session.";
    exit();
}

$batchname = $_SESSION['batchname'];
$course = $_SESSION['course'];
$studentId = $_SESSION['studentid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the subject details from the form
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $credits = $_POST['credits'];

    // Insert the subject details into the subject table
    $sql = "INSERT INTO subjectsdetail (subjects, subjectcode, credit, batchname, course) VALUES ('$subject_name', '$subject_code', '$credits', '$batchname','$course')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Subject added successfully.";
        // Optionally, redirect to the same page to refresh the student list
        header("Location: subjects.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch data from subjectsdetail table
$subjects = [];
$sql2 = "SELECT * FROM subjectsdetail";
$result = mysqli_query($conn, $sql2);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $subjects[] = $row;
    }
} else {
    echo "Error fetching subjects: " . mysqli_error($conn);
}

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Subjects List</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>Credits</th>
                    <th>Batch Name</th>
                    <th>Course</th>
                    <th>Show Files</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($subjects as $subject) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($subject['subid']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['subjects']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['subjectcode']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['credit']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['batchname']) . '</td>';
                    echo '<td>' . htmlspecialchars($subject['course']) . '</td>';
                    echo "<td><a href='subjectfiles.php?subid=" . $subject["subid"] . "' class='btn btn-info btn-sm'>Show</a></td>";
                    echo '</tr>';
                }
echo '
            </tbody>
        </table>

        <h1 class="mt-5">Insert Subject</h1>
        <form action="subjects.php" method="post" class="card p-4 mt-3">
            <div class="mb-3">
                <label for="subject_name" class="form-label">Subject Name:</label>
                <input type="text" id="subject_name" name="subject_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="subject_code" class="form-label">Subject Code:</label>
                <input type="text" id="subject_code" name="subject_code" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="credits" class="form-label">Credits:</label>
                <input type="number" id="credits" name="credits" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Insert Subject</button>
        </form>
    </div>
</body>
</html>';
?>

