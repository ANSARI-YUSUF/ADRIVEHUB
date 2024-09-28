<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input from the form
    $input = $_POST['input'];

    // Separate the input whenever a comma comes and save it into an array
    $array = explode(",", $input);

    // Trim each element in the array to remove any leading or trailing whitespace
    $array = array_map('trim', $array);

    // Output the array for demonstration purposes
    print_r($array);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Form</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Input: <input type="text" name="input">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
