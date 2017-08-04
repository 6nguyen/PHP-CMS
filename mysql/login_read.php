<?php include "db.php"; ?>
<?php include "functions.php"; ?>

// C.R.U.D - Read step

    
<?php     
// Connect to database by including db.php

// Read all MySQL data from users table
$result = userQuery();


?>



<?php include "includes/header.php"; ?>
       
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
<?php include "includes/footer.php"?>

