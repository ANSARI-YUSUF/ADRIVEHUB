<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>group message</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>GROUP MESSAGES</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="form-group">
            <label for="groupName">enter message</label>
            <input type="text" class="form-control" id="messageid" name="messagesend" placeholder="Enter message" required>
        </div>
        
        <button type="submit" name='messagesave' class="btn btn-primary">Submit</button>
         <a href="showmessage.php" class="btn btn-primary">show message</a></button>
        back to groupdeshbord :<a href="groupdesktop2.php" class="btn btn-primary">desktop</a>
        <!-- <a href="groupdesktop.php" class="btn btn-primary">show group member</a> -->
    </form>
</div> 

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

 
































<?php




session_start();
 include_once 'connection_db.php';
 include 'p/_modal.php';










 if(isset($_POST['messagesave'])) {
    if(isset($_POST['messagesend'])) {
        // echo "hello";
        if(isset($_SESSION['username'])) {
         

            $UNAME = $_SESSION['username'];
            $gname=$_SESSION['groupname'];
            $message=$_POST['messagesend'];
            $filename="groupmessage.txt";

            $finalmessage="\n".$UNAME."(".$gname.")". " : ".$message;
        //   $fil="ashishlodu";
           
        $file = fopen($filename,"w") or die("Unable to open file!");
      
            
            fwrite($file,$finalmessage);
            // fwrite($myfile,$finalmessage);
            // fclose($file);


            // $myfile = fopen($filename, "r") or die("Unable to open file!");
            // echo fread($myfile,filesize($filename));

            // // // echo "hello";
            // fclose($myfile);
           
        


    }
}
}




















// $filename="groupmessage.txt";

// $myfile = fopen($filename, "w") or die("Unable to open file!");
// $txt = "John Doe\n";
// fwrite($myfile, $txt);
// fclose($myfile);


// $myfile = fopen($filename, "r") or die("Unable to open file!");
// echo fread($myfile,filesize($filename));

// // echo "hello";
// fclose($myfile);

?>
