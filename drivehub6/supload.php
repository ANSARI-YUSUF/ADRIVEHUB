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
    $fileName2= $_SESSION['username'].','.$fileName;
    $UNAME=$_SESSION['username'];
    $query1="SELECT `U_ID` FROM `user` WHERE U_NAME="."'$UNAME'";
    $result=mysqli_query($conn,$query1);
    $data=mysqli_fetch_assoc($result);
    $uid=$data["U_ID"];
    $sid=$_SESSION['stuid'];
    // $_SESSION['stuid']
    if($fileSize>=200000)
    {
       echo'<div class="bd-callout bd-callout-warning">
       Your file is very bigg so upload small file
       </div>';
       echo '<a href="subjectfiles.php">Back</a>';
        exit();
    }
    $query3='select count(sfid)as co from sfiles where stuid="'.$sid.'" and sfname="'.$fileName.'"'; 
    $result3=mysqli_query($conn,$query3);
    $record=mysqli_fetch_assoc($result3);

    if($record["co"]>=1){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Rename your File
        <a href="subjectfiles.php">Back</a></div>
        ';
        exit();
    }

    
    // Move uploaded file to desired destination
    $uploadDir = 'suploads/';
    $destPath = $uploadDir . $fileName2;
    
    if (move_uploaded_file($fileTmpPath, $destPath)) {

        if(!$result){
            echo mysqli_error($conn);
        }
        // print_r($result);
        $fileSize=$fileSize/1000;

        $bid=$_SESSION['batchid'];
        $subid=$_SESSION['subid'];

        $query2="INSERT INTO `sfiles` (`stuid`,`U_ID`, `sfname`, `sftype`, `sfpath`,`sfsize`,`subid`,`bid`) VALUES ($sid,$uid, '$fileName', '$fileType', '$destPath','$fileSize','$subid','$bid')";
        $result2=mysqli_query($conn,$query2);
        if(!$result2){

            echo "Error uploading file.:".mysqli_error($conn);
        }
        else
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">File Upload SuccessFul';
            echo '<a href="subjectfiles.php">Back</a>';
        }
        
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Error: " . $_FILES['file']['error'];
}
?>
