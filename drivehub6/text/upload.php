<?php
require_once "connection_db.php";
require_once "boot.php";
session_start();
// Check if file was uploaded without errors
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileName2=$_SESSION["username"].','.$fileName;
    $UNAME=$_SESSION['username'];
    $query1="SELECT `U_ID` FROM `user` WHERE U_NAME="."'$UNAME'";
    $result=mysqli_query($conn,$query1);
    $data=mysqli_fetch_assoc($result);
    $uid=$data["U_ID"];
    if($fileSize>=200000)
    {
       echo'<div class="bd-callout bd-callout-warning">
       Your file is very bigg so upload small file
       </div>';
       echo '<a href="user_d.php">Back</a>';
        exit();
    }
    $query3='select count(FILE_ID)as co from files where U_ID="'.$uid.'" and FILE_NAME="'.$fileName.'"'; 
    $result3=mysqli_query($conn,$query3);
    $record=mysqli_fetch_assoc($result3);

    if($record["co"]>=1){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Rename your File
        <a href="user_d.php">Back</a></div>
        ';
        exit();
    }

    
    // Move uploaded file to desired destination
    $uploadDir = 'uploads/';
    $destPath = $uploadDir . $fileName2;
    
    if (move_uploaded_file($fileTmpPath, $destPath)) {

        if(!$result){
            echo mysqli_error($conn);
        }
        // print_r($result);
        $fileSize=$fileSize/1000;
        $query2="INSERT INTO `files` (`U_ID`, `FILE_NAME`, `FILE_TYPE`, `PATH`,`FILE_SIZE`) VALUES ($uid, '$fileName', '$fileType', '$destPath','$fileSize')";
        $result2=mysqli_query($conn,$query2);
        if(!$result2){

            echo "Error uploading file.:".mysqli_error($conn);
        }
        else
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">File Upload SuccessFul';
            echo '<a href="user_d.php">Back</a>';
        }
        
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Error: " . $_FILES['file']['error'];
}
?>
