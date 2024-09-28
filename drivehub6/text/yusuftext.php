

<?php
require_once "connection_db.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $groupname = $_POST['groupname'];
    $adminname = $_POST['adminname'];

    // Prepare SQL statement
    $sql = "INSERT INTO groups (groupname, adminname) VALUES (?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $groupname, $adminname);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Group</title>
</head>
<body>
    <h2>Create a New Group</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Group Name: <input type="text" name="groupname"><br><br>
        Admin Name: <input type="text" name="adminname"><br><br>
        <input type="submit" value="Create Group">
    </form>
</body>
</html>