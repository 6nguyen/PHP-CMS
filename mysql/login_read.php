<?php 
// C.R.U.D - Read step
    
// Connect to database
// mysqli_connect("server", "phpmyadmin user", "pw", "db name")
$connection = mysqli_connect("localhost", "root", "root99", "loginapp");

if ($connection) {
    echo "Successfully connected to database.";
} else {
    // echo and stop executing code
    die("Database connection failed");
}

// Read MySQL data from users 
$query = "SELECT * FROM users";

// prebuilt function to execute queries to db and store values in $result
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query failed. " . mysqli_error());
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-xs-6">
            
        <?php 
            // fetch_assoc returns an assoc array of the query results
            // fetch_row returns an array
            while($row = mysqli_fetch_assoc($result)) {
            ?>
              <!-- <pre> html bootstrap to organize assoc array data -->
               <pre>
                   <?php print_r($row); ?>
               </pre>
        <?php 
            } 
            ?>
            
        </div>
    </div>
</body>
</html>


