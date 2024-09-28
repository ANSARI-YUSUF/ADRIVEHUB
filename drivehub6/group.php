 <!-- 





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Group</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Create a New Group</h2>
    <form>
        <div class="form-group">
            <label for="groupName">Group Name:</label>
            <input type="text" class="form-control" id="groupName"name="gname" placeholder="Enter group name" required>
        </div>
        <div class="form-group">
            <label for="adminName">Group Admin Name:</label>
            <input type="text" class="form-control" id="adminName" name="aname"placeholder="Enter admin name" required>
        </div>
      
        <button type="submit" name='save' class="btn btn-primary">submit</button>
        <button type="submit" name='create' class="btn btn-primary"><a href ="group_member.php">submit</a></button>
    </form>
</div>

<!-- Bootstrap JS and dependencies (optional) -->
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


</




?> --> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Group</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Create a New Group</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="form-group">
            <label for="groupName">Group Name:</label>
            <input type="text" class="form-control" id="groupName" name="gname" placeholder="Enter group name" required>
        </div>
        <div class="form-group">
            <label for="adminName">Group Admin Name:</label>
            <input type="text" class="form-control" id="adminName" name="aname" placeholder="Enter admin name" required>
        </div>
        <div class="form-group">
            <label for="adminName">Group MEMBERS Name:</label>
            <input type="text" class="form-control" id="adminName" name="gmname" placeholder="Enter admin name" required>
        </div>
      
        <button type="submit" name='save' class="btn btn-primary">Submit</button>
        <button type="submit" name='desktop' class="btn btn-primary"><a href="groupdesktop.php" class="btn btn-primary">desktop</a></button>
        <!-- <a href="groupdesktop.php" class="btn btn-primary">show group member</a> -->
    </form>
</div>

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

 <!-- <?php
 session_start();
 include_once 'connection_db.php';
 include 'p/_modal.php';
 include "boot.php";
// require_once "connection_db.php";

// if(isset($_POST['save'])) {
//     if(isset($_POST['gname']) && isset($_POST['aname'])) {
//         $gname = $_POST['gname'];
//         $adminname = $_POST['aname'];
//         $groupmembername = $_POST['gmname'];
//         $adminid=1;
       
//         $query = "INSERT INTO `groups`(`GROUP_NAME`, `admin_name`,`groupmember`) VALUES ('$gname','$adminname','$groupmembername')";

//         $result = mysqli_query($conn, $query);

//         if($result) {
//             echo "Record inserted successfully.";
//         } else {
//             echo "Error: " . mysqli_error($conn);
//         }
//     } else {
//         echo "Group name and admin name must be provided.";
//     }
// }





if(isset($_POST['save'])) {
    if(isset($_POST['gname'])) {
        echo "hello";
        if(isset($_SESSION['username'])) {
         

            $UNAME = $_SESSION['username'];
            $query1 = "SELECT `U_ID` FROM `user` WHERE U_NAME='" . $UNAME . "'";
            $result12 = mysqli_query($conn, $query1);
            $data = mysqli_fetch_assoc($result12);
            $uid = $data["U_ID"];
            if (!$result12) {
                echo mysqli_error($conn);
            }
$gname = $_POST['gname'];
$adminname = $_POST['aname'];
$groupmembername = $_POST['gmname'];
$adminid=1;

$query = "INSERT INTO `groups`(`GROUP_NAME`, `admin_name`,`groupmember`,`U_ID`) VALUES ('$gname','$adminname','$groupmembername','$uid')";

$result = mysqli_query($conn, $query);

if($result) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}

    }
}
}
?>
  -->
