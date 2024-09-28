<?php
include_once 'connection_db.php';
include 'p/_modal.php';
include "boot.php";

// Define how many results you want per page
if($_REQUEST["uname"])
{
    $results_per_page = 5;

    //fetch id
    $UNAME = $_REQUEST["uname"];
    $query1 = "SELECT `U_ID` FROM `user` WHERE U_NAME='" . $UNAME . "'";
    $result = mysqli_query($conn, $query1);
    $data = mysqli_fetch_assoc($result);
    $uid = $data["U_ID"];
    if (!$result) {
        echo mysqli_error($conn);
    }
    //fetch file data with pagination
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $results_per_page;
    $query2 = "SELECT * FROM Files WHERE U_ID=" . $uid . " LIMIT $start_from, $results_per_page";
    $result2 = mysqli_query($conn, $query2);
}
else
{
    echo 'bad request';
    exit();
}


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashbord</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Drivehub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    

    <div class="container mt-8" style="margin-left: 1px;">
        <div class="row">
            <div class="col-md-3">
                <div class="card border bg-dark text-white text-center">
                    <div class="card-body">
                        <img src="p/image1.jpg" class="card-img-top mb-3" alt="Not set">
                        <h5 class="card-title"><?php echo $UNAME?><h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                        <ul class="list-group list-group-flush text-white">
                            <li class="list-group-item">Groups</li>
                            <li class="list-group-item">Files</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8" style="margin-top: 10px; margin-bottom: 90px; margin-left: 50px;">
                <table class="table" style="background-color: rgba(255, 255, 255, 0);">
                    <thead>
                    <tr>
                        <th>File Name</th>
                        <th>File type</th>
                        <th>File size</th>
                        <th>Date/time</th>
                        <th>Download</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($fdata = mysqli_fetch_assoc($result2)) {
                        ?>
                        <tr>
                            <td><?php echo $fdata["FILE_NAME"]; ?></td>
                            <!-- Add more cells for other file data -->
                            <td><?php echo $fdata["FILE_TYPE"]; ?></td>
                            <td><?php echo $fdata["FILE_SIZE"]; ?> KB</td>
                            <td><?php echo $fdata["CREATED_DATE"]; ?></td>
                            <?php
                             //fetch name and path
                            $query="select * from files where FILE_ID=".$fdata["FILE_ID"];
                            $result=mysqli_query($conn,$query);
                            if(!$result){
                                echo mysqli_error($conn);
                            }
                            $record=mysqli_fetch_assoc($result);
                            $dbpath= $record["PATH"];
                            $fname=$_REQUEST["uname"].",".$fdata["FILE_NAME"];
                            $serverFilePath = str_replace('/', DIRECTORY_SEPARATOR, $dbpath);
                            ?>
                            <td><a download="<?php echo $fname?>"href="<?php echo $serverFilePath?>">📥</a></td>
                            
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

                <!-- Pagination links -->
                <ul class="pagination">
                    <?php
                    $sql = "SELECT COUNT(*) AS total FROM Files WHERE U_ID=" . $uid;
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total_pages = ceil($row["total"] / $results_per_page);

                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li class='page-item'><a class='page-link' href='user_d.php?page=" . $i . "'>" . $i . "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById("openFileSystem").addEventListener("click", function() {
            document.getElementById("fileInput").click();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    </body>
    </html>