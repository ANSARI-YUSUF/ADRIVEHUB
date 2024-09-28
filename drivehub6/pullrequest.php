<?php
require_once "connection_db.php";
require_once "boot.php";
session_start();

function checkFileSize($fileSize) {
    if ($fileSize >= 200000) {
        echo '<div class="bd-callout bd-callout-warning">
              Your file is too big. Please upload a smaller file.
              </div>';
        echo '<a href="groupfind.php">Back</a>';
        exit();
    }
}

function checkDuplicateFile($conn, $gid, $fileName) {
    $query = 'SELECT COUNT(gfid) AS co FROM group_files WHERE G_ID="' . $gid . '" AND gfile_name="' . $fileName . '"';
    $result = mysqli_query($conn, $query);
    $record = mysqli_fetch_assoc($result);

    if ($record["co"] >= 1) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Rename your file.
              <a href="groupfind.php">Back</a></div>';
        exit();
    }
}

function moveUploadedFile($fileTmpPath, $destPath) {
    if (!move_uploaded_file($fileTmpPath, $destPath)) {
        echo "Error uploading file.";
        exit();
    }
}

function insertFileRecord($conn, $fileName, $fileType, $destPath, $fileSize, $uid, $gid) {
    $query = "INSERT INTO `group_files` (`gfile_name`, `gfile_type`, `gfile_path`, `gfile_size`, `U_ID`, `G_ID`) 
              VALUES ('$fileName', '$fileType', '$destPath', '$fileSize', $uid, $gid)";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error uploading file: " . mysqli_error($conn);
        exit();
    } else {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              File upload successful.
              <a href="groupfind.php">Back</a></div>';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {
        if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $fileType = $_FILES['file']['type'];
            $fileName2 = $_SESSION["groupadminname"] . ',' . $fileName;

            $UNAME = $_SESSION['username'];
            $query1 = "SELECT `U_ID` FROM `user` WHERE U_NAME='$UNAME'";
            $result = mysqli_query($conn, $query1);
            $data = mysqli_fetch_assoc($result);
            $uid = $data["U_ID"];

            $groupname = $_SESSION['groupname'];
            $querygn = "SELECT `G_ID` FROM `groups` WHERE GROUP_NAME='$groupname'";
            $resultgn = mysqli_query($conn, $querygn);
            $datagn = mysqli_fetch_assoc($resultgn);
            $gid = $datagn["G_ID"];

            if (!$resultgn) {
                echo mysqli_error($conn);
                exit();
            }

            checkFileSize($fileSize);
            checkDuplicateFile($conn, $gid, $fileName);

            $uploadDir = 'guploads/';
            $destPath = $uploadDir . $fileName2;

            moveUploadedFile($fileTmpPath, $destPath);

            $fileSize = $fileSize / 1000;
            insertFileRecord($conn, $fileName, $fileType, $destPath, $fileSize, $uid, $gid);
        } else {
            echo "Error: " . $_FILES['file']['error'];
        }
    } else {
        echo "No file was uploaded.";
    }
} else {
    echo "Invalid request method.";
}

echo '<a href="groupfind.php">Back</a>';
?>


<html>
    <body>
        <div class="container">
            <form method="post" enctype="multipart/form-data">
                <label for="file" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Choose File
                    <input type="file" id="file" name="file" style="display: none;" required>
                </label>
                <input type="submit" value="Upload File" class="btn btn-success">
            </form>
        </div>
    </body>
</html>
