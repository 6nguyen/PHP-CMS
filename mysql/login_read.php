<?php include "db.php"; ?>
<?php include "functions.php"; ?>

// C.R.U.D - Read step

    
<?php     
// Connect to database by including db.php

// Read all MySQL data from users table
$result = userQuery();


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
              <!-- <pre> html bootstrap to organize/present assoc array data -->
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


