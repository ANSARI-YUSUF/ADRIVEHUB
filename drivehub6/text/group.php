





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
    <form>
        <div class="form-group">
            <label for="groupName">Group Name:</label>
            <input type="text" class="form-control" id="groupName"name="gname" placeholder="Enter group name" required>
        </div>
        <div class="form-group">
            <label for="adminName">Group Admin Name:</label>
            <input type="text" class="form-control" id="adminName" name="aname"placeholder="Enter admin name" required>
        </div>
        <div class="form-group">
            <label for="members">Group Members:</label>
            <input type="text" class="form-control" id="members" name="mname" placeholder="Enter member names (separated by commas)" required>
        </div>
        <button type="submit" name='save' class="btn btn-primary"><a href ="group_member.php"Create Group>submit</a></button>
    </form>
</div>

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php



?>
