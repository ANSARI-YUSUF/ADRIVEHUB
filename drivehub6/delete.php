<?php
require_once "connection_db.php";
$fileid=$_REQUEST["file_id"];
$query="select * from files where FILE_ID=".$fileid;
$result=mysqli_query($conn,$query);
if(!$result){
    echo mysqli_error($conn);
}
$record=mysqli_fetch_assoc($result);
$dbpath= $record["PATH"];
$serverFilePath = str_replace('/', DIRECTORY_SEPARATOR, $dbpath);
// echo $serverFilePath;

if (file_exists($serverFilePath)) {
    if (unlink($serverFilePath)) {
       
        $query2="DELETE from files where FILE_ID=".$fileid;
        $result2=mysqli_query($conn,$query2);
        if(!$result2){
            echo mysqli_error($conn);
        }
        else{
            echo "File has been deleted successfully.";
            echo '<a href="user_d.php">Back</a>';
        }
        
        
        exit();
    } else {
        echo "Error: Unable to delete the file '$serverFilePath'.";
    }
} else{
 echo "not path";
}


?>