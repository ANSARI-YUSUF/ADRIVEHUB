<?php
require_once "connection_db.php";
$gfileid=$_REQUEST["gfid"];
$query="select * from group_files where gfid=".$gfileid;
$result=mysqli_query($conn,$query);
if(!$result){
    echo mysqli_error($conn);
}
$record=mysqli_fetch_assoc($result);
$dbpath= $record["gfile_path"];
echo $dbpath;
$serverFilePath = str_replace('/', DIRECTORY_SEPARATOR, $dbpath);
echo $serverFilePath;

if (file_exists($serverFilePath)) {
    echo "hello";
    if (unlink($serverFilePath)) {
       
        echo "hello";
        $query2="DELETE from group_files where gfid=".$gfileid;
        $result2=mysqli_query($conn,$query2);
        if(!$result2){
            echo mysqli_error($conn);
        }
        else{
            echo "File has been deleted successfully.";
            echo '<a href="groupdesktop2.php">Back</a>';
        }
        
        
        exit();
    } else {
        echo "Error: Unable to delete the file '$serverFilePath'.";
    }
 } else
 {
 echo "not path";
}


//

?>