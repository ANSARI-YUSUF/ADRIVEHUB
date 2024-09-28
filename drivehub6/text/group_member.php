
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Group</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

























<div class="container mt-5">
    <h2>Group member details</h2>
    <!-- <form method="post" action="//"> -->
    <form method="post">
        
       
        <div class="form-group">
            <label for="members">Group Members:</label>
            
            <input type="text" class="form-control" id="members" name="mname" placeholder="Enter member names (separated by commas)" required>
        </div>
        <button type="submit" class="btn btn-primary" name="cmember">member entered</button>
        <button type="submit" class="btn btn-primary"><a href ="gropdesktop.php">Create Group</a></button>
    </form>
</div>

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>




<?php
if (isset($_REQUEST["cmember"])) {
    // Get the input from the form
    if(isset($_REQUEST['mname'])){
    $input = $_POST['mname'];

    // Separate the input whenever a comma comes and save it into an array
    $array = explode(",", $input);

    // Trim each element in the array to remove any leading or trailing whitespace
    $array = array_map('trim', $array);

    // Output the array for demonstration purposes
    print_r($array);
    }
}

